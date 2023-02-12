<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Models\BlogCategory;

class BlogCategoryController extends MY_Controller
{
    public $table = 'blog_categories';
    public function category()
    {



        $data['categories'] = BlogCategory::get();

        return view('admin.blog.category.category', $data);
    }



    public function edit_Category($id)
    {

        $data['category'] = BlogCategory::find($id);
        $data['categories'] = BlogCategory::all();
        return view('admin.blog.category.edit-category', $data);
        /*  return response()->json([
            'status'   => 200,
            'category' => $category
        ]); */
    }


    public function delete_category(Request $request)
    {

        $id     = $request->id;
        $result = DB::table($this->table)->where('id', $id)->delete();
        return $this->resultCheck($result, "Blog Category has been deleted!");
    }

    public function delete_bulk_category(Request $request)
    {

        $ids    = $request->ids;
        $ids    = explode(",", $ids);
        $result = DB::table($this->table)->whereIn('id', $ids)->delete();
        return $this->resultCheck($result, "All selected categories has been deleted.");
    }


    public function add_Category(Request $request)
    {

        $validation = $request->validate([
            'category' => 'required',
        ]);
        $slug = $this->checkSlug(Str::slug($request->category));
        $category = new BlogCategory();
        $category->category         = $request->category;
        $category->slug             =  $slug;
        $category->category_image   =  $request->category_image;
        $result                     = $category->save();
        flash("Catgory has been created successfully!")->success();
        return back();
    }

    public function update_Category(Request $request)
    {
        $request->validate([

            'category' => 'required',
            //'slug'     => 'required'
        ]);

        $catid                      = $request->input('id');
        $category                   = BlogCategory::find($catid);
        $category->category         = $request->input('category');
        $category->parent_category  = $request->input('parent_category');
        //$category->slug             = $request->input('slug');
        $category->category_image   = $request->category_image;
        $result                     = $category->save();
        flash("Blog Category has been updated successfully!")->success();
        return redirect(route('admin.blog.category'));
    }

    protected function checkSlug($slug) {
        if(BlogCategory::where('slug',$slug)->count() > 0) {
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
