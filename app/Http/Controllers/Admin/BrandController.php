<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\BrandRepository;

class BrandController extends MY_Controller
{
    /***********************************
     * @ CONTROLLER CLASS : BRAND CONTROLLER
     * @ CONTROLLER TYPE : BUSSINESS LOGICS TYPE
     * @ FUNCTION LIST
     * ALL BRANDS
     * ADD BRANDS 
     * UPDATE BRANDS 
     * EDIT BRANDS 
     * DELETE BRAND
     * DELETE MULTIPLE BRANDS 
     ************************************/

    private  $repository;
    public function __construct(BrandRepository $repository)
    {
        //INITILIZING REPOSITORIES 
        $this->repository = $repository;
    }


    public function brands()
    {

        /*******************************
         * @  SHOWING ALL BRANDS 
         *****************************/
        $data['brands'] = $this->repository->_brands();
        return view('admin.products.brands', $data);
    }


    public function add_product_brand(Request $request)
    {
        /*******************************
         * @ CREATE BRAND  
         *****************************/

        $request->validate([
            'brand' => 'required',
        ]);

        $this->repository->_add_brand($request);
        flash("Brand has been added successfully!")->success();
        return back();
    }


    public function edit_product_brand($id)
    {
        /*******************************
         * @ EDIT BRAND WITH ID
         *****************************/

        $data['brand'] = $this->repository->_edit_brand($id);
        if($data['brand']) {
            return view('admin/products/edit-brand', $data);
        } else {
            flash("Invalid category!")->error();
            return redirect(route('admin.brands'));
        }
    }


    public function update_product_brand(Request $request)
    {
        /*******************************
         * @ UPDATE BRAND
         *****************************/

        $request->validate([
            'brand' => 'required',
            'slug'  => 'required'
        ]);

        $this->repository->_update_brand($request);
        flash("Brand has updated successfully!")->success();
        return redirect(route('admin.brands'));
    }



    public function delete_brand(Request $request)
    {
        /*******************************
         * @ DELETE BRAND
         *****************************/

        $this->repository->_delete_brand($request);
        flash("Brand has deleted successfully!")->success();
        return back();
        
    }


    public function delete_multiple_brand(Request $request)
    {

        /*******************************
         * @ MULTIPLE DELETE BRAND
         *****************************/

        $this->repository->_multi_delete_brand($request);

        flash("All selected brands has deleted successfully!")->success();
        return back();
    }
}
