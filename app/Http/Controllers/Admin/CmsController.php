<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\BlogCategory;
use App\Models\Cms;
use App\Repositories\CmsRepository\CmsRepository;

class CmsController extends MY_Controller
{
    public $table = 'cms';
    public $repository;
    public function __construct(CmsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function cms()
    {

        $data['pages'] = $this->repository->cms();


        return view('admin.cms.all-cms', $data);
    }



    public function add_page()
    {
        $data['categories'] = $this->repository->add_page();

        return view('admin.cms.add-page', $data);
    }


    public function create_page(Request $request)
    {

        $validation = $request->validate([
            'title' => 'required',
        ]);

        $this->repository->create_page($request);

        flash("Page has been created successfully!")->success();
        return redirect(route('admin.cms.page'));
    }



    public function edit_page($id)
    {

        $data['blogs'] = Cms::findOrfail($id);
        $data['categories'] = Cms::all();
        return view('admin.cms.edit-page', $data);
    }




    public function update_page(Request $request)
    {
        $request->validate([

            'title' => 'required'
        ]);


        $this->repository->update_page($request);
        flash("Cms Page has been updated successfully!")->success();
        return redirect(route('admin.cms.page'));
    }




    public function delete_page(Request $request)
    {

        $id     = $request->id;
        $result = DB::table($this->table)->where('id', $id)->delete();
        return $this->resultCheck($result, "Cms Page has been deleted!");
    }

    public function delete_bulk_pages(Request $request)
    {

        $ids    = $request->ids;
        $ids    = explode(",", $ids);
        $result = Cms::whereIn('id', $ids)->delete();
        return $this->resultCheck($result, "All selected pages has been deleted.");
    }
}
