<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    Public function AdminDashboard (){

     return view('admin.index');


    }//end of  function
    
    public function AdminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }//End of AdminDestroy function

    public function AdminLogin(){

   
        return view('admin.admin_login');

    }// End Method


    public function AdminProfile(){

          $id = Auth::user()->id;
          $adminData = User::find($id);
          return view('admin.admin_profile_view',compact('adminData'));

    }// End Method


    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if($request->file('photo')){

            $file  = $request->file('photo');
            @unlink(public_path('uploads/admin_images'.$data->photo));
            $filename = date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();
        
        $notification = array('message'=>'Admin Profile updated Successfully','alert-type'=>'success');
        
        return redirect()->back()->with($notification);
    }// End Method

    public function AdminChangePassword(){

      return view('admin.admin_change_password');


    }// End Method
    
    public function AdminUpdatePassword(Request $request){

        $request->validate([
            'old_password'=>'Required',
            'new_password'=>'Required|Confirmed'

        ]);
        //Match the Old Password
        if(!Hash::check($request->old_password,Auth::user()->password)){
         
            return back()->with('error','Old password Does Not Match');

        }
        //update the password
        User::whereId(Auth()->user()->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);
         return back()->with('status','Password Changed Successfully');
    }

}
