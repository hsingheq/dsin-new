<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
//use App\Models\Upload;
use DB;
class CategoryApiController extends Controller
{
    public function get_top_categories()
    {
		$data = DB::table('categories')
					->leftJoin('uploads', 'uploads.id', '=', 'categories.category_image')
					->select('categories.*', 'uploads.file_name')
					->get();
		if($data) {			
			$result =  array (
				'success'=> true,
				'data' => $data,
				'message' => 'Top Categories'
			);    
		} else {
			$result =  array (
				'success'=> true,
				'data' => "",	
				'message' => 'No categories found.'
			);  
		}
        return response()->json($result);  
    }
	
    public function get_category(Request $request){
		$slug = $request->slug;
		$category = Category::where('slug',$slug)->get()->first();
		return response()->json(['response'=> $category]); 
    }
}
