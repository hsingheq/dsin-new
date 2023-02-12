<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;

class CategoryController extends MY_Controller
{
    public function productCategories()
    {

        $data['categories'] = Category::get();
        return view('admin.products.product-category', $data);
    }



    public function edit_Product_Category($id)
    {

        $data['category'] = Category::find($id);
        if($data['category']){
            $data['categories'] = Category::all();
            return view('admin.products.edit-product-category', $data);
        }else {
            flash("Invalid category!")->error();
            return redirect(route('admin.productCategories'));
        }
        
        
        /*  return response()->json([
            'status'   => 200,
            'category' => $category
        ]); */
    }


    public function delete_category(Request $request)
    {

        $id     = $request->id;
        $result = DB::table('categories')->where('id', $id)->delete();
        return $this->resultCheck($result, "Category has been deleted!");
    }

    public function delete_bulk_categories(Request $request)
    {

        $ids    = $request->ids;
        $ids    = explode(",", $ids);
        $result = DB::table('categories')->whereIn('id', $ids)->delete();
        return $this->resultCheck($result, "All selected categories has been deleted.");
    }


    public function addProductCategory(Request $request)
    {

        $validation = $request->validate([
            'category' => 'required',
        ]);

        $category = new Category();
        $category->category         = $request->category;
        $category->slug             =  $request->category;
        $category->category_image   =  $request->category_image;
        $result                     = $category->save();
        flash("Catgory has been created successfully!")->success();
        return back();
    }

    public function update_Product_Category(Request $request)
    {
        $request->validate([

            'category' => 'required',
            'slug'     => 'required'
        ]);

        $catid                      = $request->input('id');
        $category                   = Category::find($catid);
        $category->category         = $request->input('category');
        $category->parent_category  = $request->input('parent_category');
        $category->slug             = $request->input('slug');
        $category->category_image   = $request->category_image;
        $result                     = $category->save();
        flash("Category has been updated successfully!")->success();
        return redirect(route('admin.productCategories'));
    }
}
