<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Repositories\BlogRepository\BlogRepository;

class BlogController extends MY_Controller
{
    public $table = 'blogs';
    public $repository;
    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function blog()
    {

        $data['posts'] = $this->repository->blog();


        return view('admin.blog.all-blog', $data);
    }



    public function add_post()
    {
        $data['categories'] = $this->repository->add_post();

        return view('admin.blog.add-post', $data);
    }


    public function create_post(Request $request)
    {

        $validation = $request->validate([
            'title' => 'required',
        ]);

        $this->repository->create_post($request);

        flash("Post has been created successfully!")->success();
        return redirect(route('admin.blog.post'));
    }



    public function edit_post($id)
    {

        $data['blogs'] = Blog::findOrfail($id);
        $data['categories'] = Blog::all();
        return view('admin.blog.edit', $data);
    }




    public function update_post(Request $request)
    {
        $request->validate([

            'title' => 'required'
        ]);


        $this->repository->update_post($request);
        flash("Blog Post has been updated successfully!")->success();
        return redirect(route('admin.blog.post'));
    }




    public function delete_post(Request $request)
    {

        $id     = $request->id;
        $result = DB::table($this->table)->where('id', $id)->delete();
        return $this->resultCheck($result, "Blog Post has been deleted!");
    }

    public function delete_bulk_posts(Request $request)
    {

        $ids    = $request->ids;
        $ids    = explode(",", $ids);
        $result = Blog::whereIn('id', $ids)->delete();
        return $this->resultCheck($result, "All selected posts has been deleted.");
    }
}
