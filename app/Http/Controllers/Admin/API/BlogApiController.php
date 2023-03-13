<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Http\Resources\BlogResource;

class BlogApiController extends Controller
{
    public function  get_post(Request $request){
        $slug = $request->slug;
        $blog = Blog::where('slug','=', $slug)->get()->first();
        return new BlogResource($blog);    
        //return response()->json(['response'=> $blog]); 
    }

    public function blogs(Request $request){
       
        /*$blog = Blog::where([
            ['status','published']
            ])->latest()->paginate(10);
        return response()->json(['response'=> $blog]); */
        //print_r($request);
        //exit;
        $number_posts = 2;
        if ($request->filtercat) {
            return BlogResource::collection(Blog::where('category_ids', 'like', '%'.$request->filtercat.'%')->latest()->paginate($number_posts)->withQueryString());
        } else if ($request->search) {
            return  BlogResource::collection(Blog::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')->latest()->paginate($number_posts)->withQueryString());
        }

        return BlogResource::collection(Blog::latest()->paginate($number_posts));    


    }
	
	public function blog_categories(Request $request){
       
        $data = BlogCategory::where([['parent_category', '=', 0]])->get();
        return response()->json(['response'=> $data]); 
    }
}
