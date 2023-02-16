<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Blog;

class BlogApiController extends Controller
{
    public function  get_post(Request $request){
        $slug = $request->slug;
        $blog = Blog::where('slug',$slug)->get()->first();
        return response()->json(['response'=> $blog]); 
    }

    public function blogs(Request $request){
       
        $blog = Blog::where([
            ['status','published'],
            ['visibility', 'public']
    ])->latest()->paginate(2);
        return response()->json(['response'=> $blog]); 
    }
}
