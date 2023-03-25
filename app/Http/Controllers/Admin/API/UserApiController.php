<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use JWTAuth;
use App\Models\UserInfo;
use App\Models\order_billing;
use Hash;
use DB;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class UserApiController extends Controller
{
    public function create_user (Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|between:1,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
        $user = new User();
        $user->first_name   =  $request->first_name;
        $user->last_name    =  $request->last_name;
        $user->email        =  $request->email; 
        $user->roles        =  json_encode(array('Customer'));
        $user->status       =  'Inactive';
        $user->password     =  bcrypt($request->password);
        $random = Str::random(60);
        $user->remember_token = $random;

        $user->save();
        $user_id = $user->id;
        $userinfo = new UserInfo();
        $userinfo->user_id = $user_id;
        $userinfo->user_key = 'mobile_number';
        $userinfo->user_value = $request->mobile;
        $userinfo->save();
        
        $domain = URL::to ('/');
        $url = $domain.'/verify/'.$random;
        $data['url'] = $url;
        $data['email'] =  $user->email;
        $data['title'] = "Email Verification";
        $data['body'] = "Please click here Below your Mail.";

        Mail::send('/Email/verifyMail',['data'=>$data], function($message) use ($data){
            $message->to($data['email'])->subject($data['title']);
        });

        return response()->json([
            'status' => 'success',
            'success' => 'Your Account has been created successfully, and email has been sent to your email address containing an activation link. Please click on the link to activate your account.'
        ], 200);
    }
    /*public function create_user(Request $request)
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
            $user->email = $request->email;
            $user->save();

            //Verifiy Email

            $user_data = User::where(['email' => $user->email])->get();
            if(count($user_data) > 0){

                $random = Str::random(40);
                $domain = URL::to ('/');
                $url = $domain.'/verify/'.$random;

                // dd($url);

                $data['url'] = $url;
                $data['email'] =  $user->email;
                $data['title'] = "Email Verification";
                $data['body'] = "Please click here Below your Mail.";

                Mail::send('/Email/verifyMail',['data'=>$data], function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']);
                });

                // dd($mail);

                $user = User::find($user_data[0]['id']);
                $user->remember_token = $random;
                $user->save();

                // dd($user);
                
                return response()->json(['success'=>true, 'msg'=>'Mail send Successfully']);


            }else{
                return response()->json(['success'=>false, 'msg'=>'User is not Found']);
            }


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
    */
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
            //$password           
            $user->save();
             //info data
            $userinfo = new UserInfo();
            $userinfo->user_id      = $user->id;
            $userinfo->user_key     = 'profile_picture';
            $userinfo->user_value   = $request->profile_picture;
            $userinfo->save();            
            
            //Send Welcome Email to User with generated $password
            $data['password'] = $password;
            $data['email'] =  $user->email;
            $data['title'] = "Welcome to DSIN";
            $data['body'] = "Your DSIN Password";

            Mail::send('/Email/WelcomeEmailWithPassword',['data'=>$data], function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });
            
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
        $u_info  =  User::where('id','=', $id)->get()->toArray();
        $profile_picture  =  UserInfo::where([['user_id', $id], ['user_key','profile_picture']])->first();
        $data=[
            'profile_picture'=> $profile_picture,
            'roles'=> $u_info[0]['roles'],
        ];
        return response()->json($data);       
    }
    public function user_data(Request $request){ 
        $id =  $request->id;  
        // $u_info  =  User::where('id','=', $id)->get()->toArray();
        $data =  DB::table('users')
        ->join('dealer_profiles',function ($join){
         //multiple conditions
         $join->on('users.id','=','dealer_profiles.user_id');
 
        })
          ->where('users.id','=',$id)
        ->where('dealer_profiles.user_id','=',$id)->select('data')->get();
        // dd($u_info);die();
        // $profile_picture  =  UserInfo::where([['user_id', $id], ['user_key','profile_picture']])->first();
        // $data=[
        //     'profile_picture'=> $profile_picture,
        //     'roles'=> $u_info[0]['roles'],
        // ];
        return response()->json($data);       
    }
    public function user_info_detail(Request $request){ 
        $id =  $request->id;
        // $u_info  =  User::where('id','=', $id)->join('dealer_profiles')->where('dealer_profiles.user_id','=','users.id')->get()->toArray();
        // $u_info = DB::table('users')
        // ->join('dealer_profiles')->where('dealer_profiles.user_id','=','users.id')
        // ->where('users.id','=',$id)
        // ->where('dealer_profiles.user_id','=',$id)
        // ->get()->toArray();
        $u_info =  DB::table('users')
        ->join('dealer_profiles',function ($join){
         //multiple conditions
         $join->on('users.id','=','dealer_profiles.user_id');
        })
          ->where('users.id','=',$id)
        ->where('dealer_profiles.user_id','=',$id)->get()->toArray();
        $profile_picture  =  UserInfo::where([['user_id', $id], ['user_key','profile_picture']])->first();
        $data=[
            'profile_picture'=> $profile_picture,
            'roles'=> $u_info[0]->roles,
            'status'=> $u_info[0]->status,
            'comment'=> $u_info[0]->comment,

            // 'status'=> $u_info[0]['status'],
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
    public function checkEmail(Request $request) {
        $email = $request->email;
        $user = User::where('email', '=', $email)->first();
        if($user) {
            return false;
        }else {
            return true;
        }
    }
    public function billing_detail(Request $request)
    {
       
        $uid=$request->id;
        $user = order_billing::where('user_id', '=', $uid)->get();
        return $user;
    }
    
}
