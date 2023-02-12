<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BlogTag;
use DB;

class BlogTagController extends MY_Controller
{
    public function tag()
    {
        $data['tags'] = BlogTag::all();
        return view('admin.blog.tags.tag', $data);
    }
    public function add_tag(Request $request, BlogTag $blogtag)
    {
        $request->validate(['name' => 'required|unique:blog_tags']);
        $slug = $this->checkSlug(Str::slug($request->category));
        $blogtag = new BlogTag();
        $blogtag->name = $request->name;
        $blogtag->slug = $slug;
        $blogtag->save();
        flash("Tag has been added successfully!")->success();
        return back();
    }


    public function edit_tag($id)
    {
        $data['tag'] = BlogTag::findOrfail($id);
        return view('admin.blog.tags.tag-edit', $data);
    }


    public function update_tag(Request $request)
    {
        $tag =  BlogTag::findOrfail($request->id);

        $tag->name = $request->name;
        //$tag->slug = $request->slug;
        $tag->save();
        flash("Tag has updated successfully!")->success();
        return redirect(route('admin.blog.tag'));
    }

    public function delete_tag($id)
    {

        $tag =  BlogTag::findOrfail($id);
        $tag->delete($id);

        flash("Tag has deleted successfully!")->success();
        return redirect(route('admin.blog.tag'));
    }


    public function delete_bulk_tag(Request $request)
    {

        $ids    = $request->ids;
        $ids    = explode(",", $ids);
        $result = DB::table('blog_tags')->whereIn('id', $ids)->delete();
        return $this->resultCheck($result, "All selected tag has been deleted.");
    }
    
    protected function checkSlug($slug) {
        if(BlogTag::where('slug',$slug)->count() > 0) {
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
