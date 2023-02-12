<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Category;
use App\Models\SiteSettings;
use App\Models\SubCategory;
use App\Models\Faq;
use Validator;

class AdminApiController extends Controller
{
   public function addAdmin(Request $request){
    $validateData = $request->validate([
    'email' => 'required',
    'password' => 'required',
    'username' => 'required',
    'roles'=> 'required',
    'status' => 'required' 
   ]);
   
        
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $usernames = $user->username;

        $response = [

            'success' => true,
            'data' =>$usernames,
            'message' => "admin has added" 
        ];
        return response()->json($response,200);
   }

   public function addCategoryApi(Request $request){
    $request->validate([
        'category' => 'required',
        'slug' => 'required'
    ]);

    $input = $request->all();
    $category =  Category::create($input);
    return response()->json('Category Created',200);
    

   } 
   
   public function siteSettingApi(Request $request){
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    $input = $request->all();
    $category =  SiteSettings::create($input);
    return response()->json('site setting has done',200);
    

   }
   
   
   public function subCategoryApi(Request $request){
    $request->validate([
        'category' => 'required',
        'subcategory' => 'required',
    ]);

    $input = $request->all();
    $category =  SubCategory::create($input);
    return response()->json('created',200);
    

   }



   public function addFaqCategoryApi(Request $request){
    $request->validate([

       
        'categoryname' => 'required',
        'categoryslug' => 'required',
        'metakeywords' => 'required',
        'metadescription' => 'required',
    ]);

    $input = $request->all();
    $category =  Faq::create($input);
    return response()->json('created',200);
    

   }



  public function alluserapi(){
    $res =  User::get();
    return response()->json($res);
    
  }
}
