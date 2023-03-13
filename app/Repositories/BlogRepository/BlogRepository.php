<?php

namespace App\Repositories\BlogRepository;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Models\Blog;
use App\Models\BlogCategory;

use App\Repositories\Interfaces\BlogInterface\BlogInterfacesRepository;

class BlogRepository implements BlogInterfacesRepository
{

    public function blog()
    {
        return  Blog::latest()->get();
    }


    public function add_post()
    {

        return  BlogCategory::all();
    }


    public function create_post($request)
    {
        $slug = $this->checkSlug(Str::slug($request->title));
        //SAVING BLOG
        $Blog = new Blog();
        $Blog->title            =   $request->title;
        $Blog->slug             =   $slug;
        $Blog->description      =   $request->description;
        $Blog->thumbnail_img    =   $request->thumbnail_img;
        $Blog->category_ids     =   (isset($request->category_ids)) ? json_encode($request->category_ids) : NULL;
        $Blog->meta_description =   $request->meta_description;
        $Blog->meta_keyword     =   $request->meta_keyword;
        $Blog->is_featured      =   $request->is_featured;
        $Blog->status           =   $request->status;
        $Blog->tag_ids          =   (isset($request->tag_ids)) ? json_encode($request->tag_ids) : NULL;
        $Blog->user_id     =   $request->published_by;
        $Blog->save();
    }


    public function update_post($request)
    {
        $slug = $this->checkSlug(Str::slug($request->title));

        $id                     =   $request->input('id');
        $Blog                   =   Blog::find($id);
        $Blog->title            =   $request->title;
        //$Blog->slug             =   $slug;
        $Blog->description      =   $request->description;
        $Blog->thumbnail_img    =   $request->thumbnail_img;
        $Blog->category_ids     =   (isset($request->category_ids)) ? json_encode($request->category_ids) : NULL;
        $Blog->meta_description =   $request->meta_description;
        $Blog->meta_keyword     =   $request->meta_keyword;
        $Blog->is_featured      =   $request->is_featured;
        $Blog->status           =   $request->status;
        $Blog->tag_ids          =   (isset($request->tag_ids)) ? json_encode($request->tag_ids) : NULL;
        $Blog->user_id          =   $request->published_by;
        $result                 = $Blog->save();
    }

    protected function checkSlug($slug) {
        if(blog::where('slug',$slug)->count() > 0) {
            $numIn = $this->countEndingDigits($slug);
            if ($numIn > 0) {
                    $base_portion = substr($slug, 0, -$numIn);
                    $digits_portion = abs(substr($slug, -$numIn));
            } else {
                    $base_portion = $slug . "-";
                    $digits_portion = 0;
            }
        
            $slug = $base_portion . intval($digits_portion + 1);
            $slug = $this->checkSlug($slug);
        }
    
        return $slug;
    }
    protected function countEndingDigits($string) {
        $tailing_number_digits =  0;
        $i = 0;
        $from_end = -1;
        while ($i < strlen($string)) :
        if (is_numeric(substr($string, $from_end - $i, 1))) :
            $tailing_number_digits++;
        else :
            // End our while if we don't find a number anymore
            break;
        endif;
        $i++;
        endwhile;
        return $tailing_number_digits;
    }
}
