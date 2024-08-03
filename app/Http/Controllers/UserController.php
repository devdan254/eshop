<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function UserDashboard(){

        $id = Auth::user()->id;
        $userData = User::find($id);
        
        return view('index',compact('userData'));


    }//End of Menthod

    public function UserProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if($request->file('photo')){

            $file  = $request->file('photo');
            @unlink(public_path('uploads/admin_images'.$data->photo));
            $filename = date('YMDHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();
        
        $notification = array('message'=>'User Profile updated Successfully','alert-type'=>'success');
        
        return redirect()->back()->with($notification);
    }// End Method

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }//End of method


    public function UserUpdatePassword(Request $request){

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
    //End Method

}
