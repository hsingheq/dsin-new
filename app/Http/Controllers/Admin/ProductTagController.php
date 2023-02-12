<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductTag;
use DB;

class ProductTagController extends MY_Controller
{
    public function tag()
    {
        $data['tags'] = ProductTag::all();
        return view('admin.products.tags.tag', $data);
    }
    public function add_tag(Request $request, ProductTag $blogtag)
    {
        $request->validate(['name' => 'required|unique:blog_tags']);
        $blogtag = new ProductTag();
        $blogtag->name = $request->name;
        $blogtag->slug = $request->name;
        $blogtag->save();
        flash("Tag has been added successfully!")->success();
        return back();
    }


    public function edit_tag($id)
    {
        
        $data['tag'] = ProductTag::find($id);
        if($data['tag']) {
            return view('admin.products.tags.tag-edit', $data);
        } else {
            flash("Invalid product tag!")->error();
            return redirect(route('admin.product.tag'));
        }
    }


    public function update_tag(Request $request)
    {
        $tag =  ProductTag::findOrfail($request->id);
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->save();
        flash("Tag has updated successfully!")->success();
        return redirect(route('admin.product.tag'));
    }

    public function delete_tag($id)
    {

        $tag =  ProductTag::findOrfail($id);
        $tag->delete($id);

        flash("Tag has deleted successfully!")->success();
        return back();
    }


    public function delete_bulk_tag(Request $request)
    {

        $ids    = $request->ids;
        $ids    = explode(",", $ids);
        $result = DB::table('product_tags')->whereIn('id', $ids)->delete();
        return $this->resultCheck($result, "All selected tag has been deleted.");
    }
}
