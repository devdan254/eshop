<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class VendorController extends Controller
{
    //

    Public function vendorDashboard (){

        return view('vendor.index');
   
   
       }

       
       public function vendorDestroy(Request $request)
       {
           Auth::guard('web')->logout();
   
           $request->session()->invalidate();
   
           $request->session()->regenerateToken();
   
           return redirect('/vendor/login');
       }//End of vendorDestroy function
   
       public function vendorLogin(){
   
      
           return view('vendor.vendor_login');
   
       }// End Method
   
   
       public function vendorProfile(){
   
             $id = Auth::user()->id;
             $vendorData = User::find($id);
             return view('vendor.vendor_profile_view',compact('vendorData'));
   
       }// End Method
   
   
       public function vendorProfileStore(Request $request){
   
           $id = Auth::user()->id;
           $data = User::find($id);
   
           $data->name = $request->name;
           $data->email = $request->email;
           $data->phone = $request->phone;
           $data->address = $request->address;
           $data->vendor_short_info = $request->vendor_short_info;
           if($request->file('photo')){
   
               $file  = $request->file('photo');
               @unlink(public_path('uploads/vendor_images'.$data->photo));
               $filename = date('YMDHi').$file->getClientOriginalName();
               $file->move(public_path('uploads/vendor_images'),$filename);
               $data['photo'] = $filename;
           }
   
           $data->save();
           
           $notification = array('message'=>'vendor Profile updated Successfully','alert-type'=>'success');
           
           return redirect()->back()->with($notification);
       }// End Method
   
       public function vendorChangePassword(){
   
         return view('vendor.vendor_change_password');
   
   
       }// End Method
       
       public function vendorUpdatePassword(Request $request){
   
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

       public function BecomeVendor(){


        return view('auth.become_vendor');

       }

       public function VendorRegister(Request $request) {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        User::insert([ 
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'vendor_join' => $request->vendor_join,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
        ]);

          $notification = array(
            'message' => 'Vendor Registered Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('vendor.login')->with($notification);

    }// End Mehtod 
   
}
