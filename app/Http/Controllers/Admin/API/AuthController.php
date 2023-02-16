<?php

namespace App\Http\Controllers\Admin\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserVerify;
//use Validator;
use Hash;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register' ,'verficationMail']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => 'Email or Password is required.'], 401);
        }
        
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if($user->status=='Active'){
                if (Hash::check($request->password, $user->password)) {
                    if (! $token = auth()->attempt($validator->validated())) {
                        return response()->json(['error' => 'Unauthorized'], 401);
                    }
                    $token = auth('api')->attempt($validator->validated()); 
                    return $this->createNewToken($token);

                } else {
                    return response()->json(['error' => 'Password is incorrect!'], 401);
                }
            } else {
                return response()->json(['error' => 'Your account is not active.'], 401);
            }
        } else {
            return response()->json(['error' => 'Email doesn`t exists.'], 401);
        }
        return $this->createNewToken($token);
    }

    /*public function login(Request $request){ 
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = JWTAuth::attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        


        $user = User::where('email', '=', $request->email)->first();
        if ($user) {

            if($user->status=='Active'){
                if (Hash::check($request->password, $user->password)) {
                    
                    return $this->createNewToken($token);

                } else {
                    return response([
                        'message'=> "Password is incorrect!",
                    ]);
                  
                }
            }
            

            else{
                return response([
                    'message'=> "Account is not active!",
                ]);
              
            }
        } else {
            return response([
                'message'=> "Email doesn't exist!",
            ]);
          
        }

    }
    */    

    public function register(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|confirmed|',
        ]);



        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->toJson()], 400);
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));
        

                

        if (! $token = JWTAuth::attempt($request->only('email','password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token); 
        
         
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60 * 60,
            'user' => auth()->user()
        ]);
    }

    public function getUser(Request $request)
    {
        return response()->json($request->user());
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }


    public function verifyAccount($email)
    {


        if(auth()->user()){
            $user = User::where('email',$email)->get();
          

            if(count($user) > 0){

                $random = Str::random(40);
                $domain = URL::to ('/');
                $url = $domain.'/verify/'.$random;

                // dd($url);

                $data['url'] = $url;
                $data['email'] = $email;
                $data['title'] = "Email Verification";
                $data['body'] = "Please click here Below your Mail.";

                Mail::send('verifyMail',['data'=>$data], function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']);
                });

                // dd($mail);

                $user = User::find($user[0]['id']);
                $user->remember_token = $random;
                $user->save();

                // dd($user);
                
                return response()->json(['success'=>true, 'msg'=>'Mail send Successfully']);


            }else{
                return response()->json(['success'=>false, 'msg'=>'User is not Found']);
            }
            
        }else{
            return response()->json(['success'=>false, 'msg'=>'User is not Authenticated']);
        }
  
     
    }

    public function verficationMail($token){
       $data = User::where(['remember_token' => $token])->get();
        if(count($data) > 0){
             $datetime = Carbon::now()->format('Y-m-d H:i:s');
            $user = User::find($data[0]['id']);
            $user->remember_token = '';
            $user->is_verified = 1 ;
            $user->is_email_verified = $datetime;
            $user->save();
             return view('EmailVerified'); 
        }else{
            return view('404');
        }
    }
}
