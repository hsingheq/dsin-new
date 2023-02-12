<?php

namespace App\Repositories\CmsRepository;


use Illuminate\Http\Request;
use DB;
use App\Models\Cms;
use App\Models\BlogCategory;

use App\Repositories\Interfaces\CmsInterface\CmsInterfacesRepository;

class CmsRepository implements CmsInterfacesRepository
{

    public function cms()
    {
        return  Cms::latest()->get();
    }


    public function add_page()
    {

        return  BlogCategory::all();
    }


    public function create_page($request)
    {
        //SAVING BLOG
        $Page = new Cms();
        $Page->title            =   $request->title;
        $Page->slug             =   $request->title;
        $Page->description      =   $request->description;
        $Page->thumbnail_img    =   $request->thumbnail_img;
        // $Page->category_ids     =   (isset($request->category_ids)) ? json_encode($request->category_ids) : NULL;
        $Page->meta_description =   $request->meta_description;
        $Page->meta_keyword     =   $request->meta_keyword;
        $Page->is_featured      =   $request->is_featured;
        $Page->status           =   $request->status;
        $Page->visibility       =   $request->visibility;
        // $Page->tag_ids          =   (isset($request->tag_ids)) ? json_encode($request->tag_ids) : NULL;
        $Page->published_by     =   $request->published_by;
        $Page->save();
    }


    public function update_page($request)
    {
        $id                     =   $request->input('id');
        $Page                   =   Cms::find($id);
        $Page->title            =   $request->title;
        $Page->slug             =   $request->title;
        $Page->description      =   $request->description;
        $Page->thumbnail_img    =   $request->thumbnail_img;
        // $Page->category_ids     =   (isset($request->category_ids)) ? json_encode($request->category_ids) : NULL;
        $Page->meta_description =   $request->meta_description;
        $Page->meta_keyword     =   $request->meta_keyword;
        $Page->is_featured      =   $request->is_featured;
        $Page->status           =   $request->status;
        $Page->visibility       =   $request->visibility;
        // $Page->tag_ids          =   (isset($request->tag_ids)) ? json_encode($request->tag_ids) : NULL;
        $Page->published_by     =   $request->published_by;
        $result                     = $Page->save();
    }
}
