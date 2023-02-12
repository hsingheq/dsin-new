<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
class CategoryApiController extends Controller
{
    public function get_top_categories()
    {


        $data = DB::table('categories')
            ->join('uploads',  'uploads.id','=', 'categories.category_image')
            ->select('category','file_name','slug','categories.id','file_original_name')
            ->get();
           
          $res =  [
           'success'=> true,
           'data' => $data,
          'message' => 'getting categories..'
        ]; 

        
         return response()->json($res);  
  
    }

    public function  get_category(Request $request){
          $slug = $request->slug;
          $category = Category::where('slug',$slug)->get()->first();
          return response()->json(['response'=> $category]); 
      }
}
