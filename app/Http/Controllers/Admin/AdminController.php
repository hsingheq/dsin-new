<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserVerify;
use Session;
use DB;
use Hash;

class AdminController extends Controller
{
   
   public function login()
   {
      return view("Auth/login");
   }

   public function register()
   {
      return view('Auth.register');
   }

   public function admin_register(Request $request)
   {
      $request->validate([
         'email' => 'email|required',
         'password' => 'required',
         'username' => 'required'
      ]);

      $user  =  new User();
      $user->email =  $request->email;
      $user->password = Hash::make($request->password);
      $user->username =  $request->username;
      $user->roles =  "Admin";
      $user->status =  "Active";
      $res = $user->save();



    
       

      if ($res) {
         return redirect()->back()->with('success', "admin created!");
      } else {
         return redirect()->back()->with("failed", "something went wrong.");
      }
      // print_r($request->all());
   }

   public function loginuser(Request $request)
   {
      // print_r($request->all());
      $request->validate([
         'email' => 'required|email',
         'password' => 'required'
      ]);

      $user = User::where('email', '=', $request->email)->first();
      if ($user) {
         if (Hash::check($request->password, $user->password)) {


            $jrole =  json_decode($user->roles);

            @$role =  $jrole->Admin;
            if ($role != "Admin") {
               return redirect()->back()->with('fail', 'you are not able to login.');
            } else {

               $request->Session()->put('loginId', [
                  'id' => $user->id,
                  'email' => $user->email,
                  'username' => $user->username,
                  'roles' => $role

               ]);

               return redirect('admin');
            }
         } else {
            return redirect()->back()->with('fail', 'password has incorrect!');
         }
      } else {
         return redirect()->back()->with('fail', 'Email does not exist!');
      }
   }


   

 
}
