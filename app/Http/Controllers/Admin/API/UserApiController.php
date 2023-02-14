<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use JWTAuth;
use App\Models\UserInfo;
use Hash;
use DB;
class UserApiController extends Controller
{
    public function create_user(Request $request)
    {
      

        $user = new User();
        $user->first_name   =  $request->first_name;
        $user->last_name    =  $request->last_name;
        $user->roles        =  json_encode(array('Customer' => 'Customer'));
        $user->status       =  'Inactive';
        $user->password     =  bcrypt($request->password);
        $useremail = User::where('email', '=', $request->email)->first();
        if ($useremail) {
            $response = [
                'success' => true,
                'errormsg' => "Email already exist!",
                'message' => "Email already exist!"
            ];
        } else {
            $user->email        =  $request->email;
             $user->save();

        //  SAVING EXTRA INFO 
            $user_id = $user->id;
            $userinfo = new UserInfo();
            $userinfo->user_id = $user_id;
            $userinfo->user_key = 'mobile_number';
            $userinfo->user_value = $request->mobile;
            $userinfo->save();
            $response = [

                'success' => true,
                'data' => $request->first_name,
                'message' => "Your Account has been created successfully, and email has been sent to your email address containing an activation link. Please click on the link to activate your account."
            ];
        }




        return response()->json($response);
    }

    public function arjun(){
       $vals =  DB::table('shopping_carts')
       ->join('users',function ($join){
        //multiple conditions
        $join->on('users.id','=',DB::raw("2"));

       })
       ->join('products','products.id','shopping_carts.product_id')
       ->join('uploads','uploads.id','products.thumbnail_img')
       ->get();
       //->join('uploads','uploads.id','products.thumbnail_img')
       /* ->where('user_id',2) */
     
       /* $vals = DB::table('shopping_carts') */
   
    /* ->join('users','users.id','shopping_carts.user_id') */
     /*   ->join('products','products.id','shopping_carts.product_id')
       ->join('uploads','uploads.id','products.thumbnail_img')
      
       ->get(); */
        /* ['user_id',1],
        ['user_key','mobile_number']
                ])->get()->toArray(); */
       echo "<pre>";
       print_r($vals); 
    }

    public function update_customer(Request $request)
    {
        $res = $request->all();

        $id                 = $request->id;
        $user               = User::find($id);
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        
        $user->save();
        $userinfo = new UserInfo(); 

        $image_name='';
        if($request->file('file')){
            $file = $request->file('file');
            $image_name = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('images'),$image_name);
    /*     $file_name = time().'-'.$request->file->getClientOriginalName();
        $file_path = $request->file('file')->storeAs('uploads',$file_name,'public'); */
        $userinfo->user_key = 'profile_pic';
        $userinfo->user_value = $image_name;
        $userinfo->save();


        } 

    

      
       $get_mobile  =  UserInfo::where([
                                ['user_id',$id],
                                ['user_key','mobile_number']
                                        ])->first();

        if($get_mobile)
        {
            $get_mobile->user_value = $request->mobile; 
            $get_mobile->save();

        }else{
            $userinfo = new UserInfo();
            $userinfo->user_id  =  $id;
            $userinfo->user_key = 'mobile_number';
            $userinfo->user_value = $request->mobile;
            $userinfo->save();
            
        }

        

        $result     = $user->save();
        $res        = ['msg' => 'Profile updated successfully!'];  
      //  $res = ['id'=> $id];
        return response()->json(['msg'=>$image_name]);
    }


    function changePassword(Request $request) {
        $user = User::where('id', '=', $request->id)->first();

        if(Hash::check($request->current_password, $user->password))
        {
            if($request->password===$request->confirm_password){
                User::where('id',$request->id)->update(['password'=> bcrypt($request->password)]);
                $response = [
                    'success' => true,
                    'data' => "Ok",
                    'response' => "Your password has been updated successfully!",
                   
                ];
            }else{
                $response = ['response' => 'Password not match incorrect!']; 
            }


          
        }else{

            $response = ['response' => 'Password is incorrect!']; 
        }
        /*if (!empty($request->email) || !empty($request->password)) {
            
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $response = [

                        'success' => true,
                        // 'data' => $request->email,
                        'data' => ['email' => $request->email, 'name' => $user->first_name],
                        'name' => $user->first_name,
                        'message' => "Authenticated Successfully!"
                    ];
                } else {
                    $response = ['message' => 'Password is incorrect!'];
                }
            } else {
                $response = ['message' => "Email doesn't exist!"];
            }
        } else {
            $response = ['message' => 'Email and Password fields cannot be empty!'];
        }*/
      
        return response()->json($response);
    }

    public function get_user_data(Request $request)
    {
        return response()->json(['msg'=>'setting']);
    }

    public function google_auth_login(Request $request){
        $response =   $request->all();    
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            $token=JWTAuth::fromUser($user);
            return $this->createNewToken($token, $user);
        } else {         
            /**
             * @GOOGLE OAUTH REGISTERING 
             * @LOGGING 
             * @DESCRIPTION: register and after login.
             */
            $user  =  new User();
            $user->first_name   = $request->first_name; 
            $user->last_name    = $request->last_name; 
            $user->email        = $request->email; 
            $user->roles        =  json_encode(array('Customer'));
            $user->status       =  'Active';
            $password           = str_shuffle('abcde56789_+$@$%0pqxyz');
            $user->password  = bcrypt($password);
            //mailing welcome the password
            //$password           
            $user->save();
             //info data
            $userinfo = new UserInfo();
            $userinfo->user_id      = $user->id;
            $userinfo->user_key     = 'profile_picture';
            $userinfo->user_value   = $request->profile_picture;
            $userinfo->save();            
            $token=JWTAuth::fromUser($user);
            return $this->createNewToken($token, $user);
        }  
    }

  /*   public function google_avatar(){

        $get_avatar  =  UserInfo::where([
            ['user_id',26],
            ['user_key','google_avatar']
                    ])->first();
$data=[
    
    'google_avatar'=> $get_avatar
];
                  return response()->json($data);

    } */

    public function user_info(Request $request){ 
        $id =  $request->id;  
        $profile_picture  =  UserInfo::where([['user_id', $id], ['user_key','profile_picture']])->first();
        $data=[
            'profile_picture'=> $profile_picture
        ];
        return response()->json($data);       
    }
    
    protected function createNewToken($token, $user){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60 * 60,
            'user' => $user
        ]);
    }
    
}
