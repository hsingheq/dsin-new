<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class HomeApiController extends Controller
{
    public function facebook_enable()
    {
        $res =  \App\Models\ExtraSettings::where('setting_name', '=', 'facebook_login_enable')
            ->get()
            ->first();

        //$res =  User::get();
        return response()->json($res);
    }


    public function get_setting_data()
    {
        
       $res =  [
        'success'=> true,
        'data' => [
            'footer_address'    => get_setting('footer_address'),
            'footer_phone'      => get_setting('footer_phone'),
            'footer_email'      => get_setting('footer_email'),
            'footer_about'      => get_setting('footer_about'),
            'copy_right'        => get_setting('copy_right'),
            'custom_css'        => get_setting('custom_css'),
            'custom_js'         => get_setting('custom_js'),
            'site_logo'         => get_uploaded_image_url(get_setting('site_logo')),
        ], 
        'message'=>'setting values...'];
        return response()->json($res);
    }


    
   


    public function social_settings()
    {
        $res =  [
            'success'=> true,
            'data' => [
                'google_login_enable'    => get_setting('google_login_enable'),
                'google_client_id'      => get_setting('google_client_id'),
                
                 ], 
            ];
            return response()->json($res);
    }


    public function getUsers()
    {
        $res = User::where('email', '=', 'aa@aa.com')
            ->get()
            ->first();

        //$res =  User::get();
        return response()->json($res);
    }

    

    public function edit_customer($email)
    {
        $email = $email;
        $res = User::where('email', '=', $email)
            ->select('id', 'email', 'first_name', 'last_name', 'mobile', 'roles', 'status')
            ->get()
            ->first();
        /* 
        $response = [

            'success' => true,
            'data' => $res,
            'message' => "success"
        ]; */
        return response()->json($res);
    }



    public function loginUser(Request $request)
    {
        if (!empty($request->email) || !empty($request->password)) {
            $user = User::where('email', '=', $request->email)->first();
            if ($user) {

                if($user->status==='Active'){
                    if (Hash::check($request->password, $user->password)) {
                        $response = [
    
                            'success' => true,
                            'token_id'    => sha1(md5($request->id)),
                            // 'data' => $request->email,
                            /* 'data' => ['id' => $request->id,
                            'email' => $request->email, 
                            'name' => $user->first_name],
                            'name' => $user->first_name, */
                            'message' => "Authenticated Successfully!"
                        ];
                    } else {
                        $response = ['message' => 'Password is incorrect!'];
                    }
                }
                

                else{
                    $response = ['message' => 'Account  is not active!'];
                }
            } else {
                $response = ['message' => "Email doesn't exist!"];
            }
        } else {
            $response = ['message' => 'Email and Password fields cannot be empty!'];
        }
        return response()->json($response);
    }


    

   
}
