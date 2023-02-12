<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product_reviews extends MY_Controller
{
    public $table = 'reviews';
    public function reviews()
    {
        $data['reviews'] = $this->_getAll($this->table);
        return view('admin.reviews.reviews', $data);
    }

    
    public function delete_review(Request $request)
    {
        $id = $request->id;
        $result = $this->_delete($this->table, $id);
        flash("Coupon has Deleted!")->success();
        return back();
    }


    public function delete_multiple_review($id)
    {

        $ids = $id;
        $ids = explode(",", $ids);
        $result = $this->_multiple_delete($this->table, $ids);

        flash("Selected Coupan has been deleted.")->success();
        return back();
    }
}
