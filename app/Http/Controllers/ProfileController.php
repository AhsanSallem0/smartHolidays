<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use DB;
use Hash;
use Image;
use Yajra\Datatables\Datatables;
class ProfileController extends Controller
{
    // profile page
    public function profilePage(){
        $id = Auth::user()->id;
        $user = User::find($id);
        
        return view("profile.index",compact('user'));
    }

    // edit profile 1
    public function update1(Request $request,$id){
        if($profile = $request->file('profile')){
            $name_gen = hexdec(uniqid()).'.'.$profile->GetClientOriginalExtension();
            Image::make($profile)->resize(300,200)->save('img/admin/'.$name_gen);

            $last_img = 'img/admin/'.$name_gen;

            User::find($id)->update([
                'firstname' => $request->fname,
                'lastname' => $request->lname,
                'address' => $request->address,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'postal' => $request->postal,
                'city' => $request->city,
                'country' => $request->country,
                'profile' => $last_img,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Profile has been updated!',
                'alert_type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
        else{
            User::where('id',$id)->update([
                'firstname' => $request->fname,
                'lastname' => $request->lname,
                'address' => $request->address,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'postal' => $request->postal,
                'city' => $request->city,
                'country' => $request->country,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Profile has been updated!',
                'alert_type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        
        }
    }

    // update profil e2
       public function update2(Request $request,$id){
       
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Profile has been updated!',
            'alert_type' => 'warning'
        );
        return Redirect()->back()->with($notification);
     }
}
