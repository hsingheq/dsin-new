<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use DB;
use App\Models\Brands;
use App\Repositories\Interfaces\BrandInterfacesRepository;

class BrandRepository implements BrandInterfacesRepository
{
    public  function _brands()
    {
        //SHOWING ALL BRANDS NAMES

        return Brands::get();
    }


    public function _add_brand($request)
    {
        //SUBMITTING BRAND ADD REQUEST INTO DB

        $brand = new Brands();
        $brand->brand       = $request->brand;
        $brandimage         = $request->brandimage;
        $brand->brandimage  = $brandimage;
        $brand->slug        = $request->brand;
        $result             = $brand->save();
    }


    public function _edit_brand($id)
    {
        //GETTING AND SENDING IDS

        return Brands::findOrfail($id);
    }


    public function _update_brand($request)
    {
        //UPDATING BRAND 

        $brandid = $request->input('id');
        $brand   = Brands::find($brandid);
        $brand->brand  = $request->input('brand');
        $brand->slug   = $request->input('slug');
        $brand->brandimage   = $request->input('brandimage');
        $result = $brand->save();
    }


    public function _delete_brand($request)
    {
        //DELETE BRAND

        $id       = $request->id;
        $result   = DB::table('brands')->where('id', $id)->delete();
    }


    public function _multi_delete_brand($request)
    {
        //DELETE MULTIPLE BRAND 

        $ids = $request->ids;
        $ids = explode(",", $ids);
        $result = DB::table('brands')->whereIn('id', $ids)->delete();
    }
}
