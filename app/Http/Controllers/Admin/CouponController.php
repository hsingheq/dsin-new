<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Coupan;

class CouponController extends MY_Controller
{
    public $table = 'coupans';
    public function index()
    {
    }
    public function coupons()
    {
        $data['coupons'] = $this->_getAll($this->table);
        return view('admin.ecommerce.coupons', $data);
    }
    public function create_coupon()
    {
        return view('admin.ecommerce.coupons.create_coupon');
    }



    public function get_coupon_form(Request $request)
    {
        if ($request->coupon_type == "product_base") {
            return view('admin.ecommerce.coupons.product_base_coupon');
        } elseif ($request->coupon_type == "cart_base") {
            return view('admin.ecommerce.coupons.cart_base_coupon');
        }
    }

    public function add_coupon(Request $request, Coupan $coupon)
    {
        if (count(Coupan::where('code', $request->coupon_code)->get()) > 0) {
            flash(translate('Coupon already exist for this coupon code'))->error();
            return back();
        }
        $coupon = new Coupan;
        if ($request->coupon_type == "product_base") {
            $coupon->type = $request->coupon_type;
            $coupon->code = $request->coupon_code;
            $coupon->discount = $request->discount;
            $coupon->discount_type = $request->discount_type;
            $date_var                 = explode(" - ", $request->date_range);
            $coupon->start_date       = strtotime($date_var[0]);
            $coupon->end_date         = strtotime($date_var[1]);
            $cupon_details = array();
            foreach ($request->product_ids as $product_id) {
                $data['product_id'] = $product_id;
                array_push($cupon_details, $data);
            }
            $coupon->details = json_encode($cupon_details);
            if ($coupon->save()) {
                flash(translate('Coupon has been saved successfully'))->success();
                return redirect()->route('admin.coupons');
            } else {
                flash(translate('Something went wrong'))->danger();
                return back();
            }
        } elseif ($request->coupon_type == "cart_base") {
            $coupon->type             = $request->coupon_type;
            $coupon->code             = $request->coupon_code;
            $coupon->discount         = $request->discount;
            $coupon->discount_type    = $request->discount_type;
            $date_var                 = explode(" - ", $request->date_range);
            $coupon->start_date       = strtotime($date_var[0]);
            $coupon->end_date         = strtotime($date_var[1]);
            $data                     = array();
            $data['min_buy']          = $request->min_buy;
            $data['max_discount']     = $request->max_discount;
            $coupon->details          = json_encode($data);
            if ($coupon->save()) {
                flash(translate('Coupon has been saved successfully'))->success();
                return redirect()->route('admin.coupons');
            } else {
                flash(translate('Something went wrong'))->danger();
                return back();
            }
        }
    }

    public function delete_coupon(Request $request)
    {
        $id = $request->id;
        $result = $this->_delete($this->table, $id);
        flash("Coupon has Deleted!")->success();
        return back();
    }


    public function delete_multiple_coupon($id)
    {

        $ids = $id;
        $ids = explode(",", $ids);
        $result = $this->_multiple_delete($this->table, $ids);

        flash("Selected Coupan has been deleted.")->success();
        return back();
    }

    public function edit_coupon($id)
    {
        $coupon = Coupan::findOrFail($id);
        return view('admin.ecommerce.coupons.edit', compact('coupon'));
    }

    public function update_coupon(Request $request)
    {
        $id = $request->id;
        if (count(Coupan::where('id', '!=', $id)->where('code', $request->coupon_code)->get()) > 0) {
            flash(translate('Coupon already exist for this coupon code'))->error();
            return back();
        }

        $coupon = Coupan::findOrFail($id);
        if ($request->coupon_type == "product_base") {
            $coupon->type = $request->coupon_type;
            $coupon->code = $request->coupon_code;
            $coupon->discount = $request->discount;
            $coupon->discount_type  = $request->discount_type;
            $date_var                 = explode(" - ", $request->date_range);
            $coupon->start_date       = strtotime($date_var[0]);
            $coupon->end_date         = strtotime($date_var[1]);
            $cupon_details = array();
            foreach ($request->product_ids as $product_id) {
                $data['product_id'] = $product_id;
                array_push($cupon_details, $data);
            }
            $coupon->details = json_encode($cupon_details);
            if ($coupon->save()) {
                flash(translate('Coupon has been saved successfully'))->success();
                return redirect()->route('admin.coupons');
            } else {
                flash(translate('Something went wrong'))->danger();
                return back();
            }
        } elseif ($request->coupon_type == "cart_base") {
            $coupon->type           = $request->coupon_type;
            $coupon->code           = $request->coupon_code;
            $coupon->discount       = $request->discount;
            $coupon->discount_type  = $request->discount_type;
            $date_var               = explode(" - ", $request->date_range);
            $coupon->start_date     = strtotime($date_var[0]);
            $coupon->end_date       = strtotime($date_var[1]);
            $data                   = array();
            $data['min_buy']        = $request->min_buy;
            $data['max_discount']   = $request->max_discount;
            $coupon->details        = json_encode($data);
            if ($coupon->save()) {
                flash(translate('Coupon has been saved successfully'))->success();
                return redirect()->route('admin.coupons');
            } else {
                flash(translate('Something went wrong'))->danger();
                return back();
            }
        }
    }


    public function get_coupon_form_edit(Request $request)
    {
        if ($request->coupon_type == "product_base") {
            $coupon = Coupan::findOrFail($request->id);
            return view('admin.ecommerce.coupons.product_base_coupon_edit', compact('coupon'));
        } elseif ($request->coupon_type == "cart_base") {
            $coupon = Coupan::findOrFail($request->id);
            return view('admin.ecommerce.coupons.cart_base_coupon_edit', compact('coupon'));
        }
    }
    /*  public function add_coupon(Request $request, PromoCode $promoCode)
    {
        $request->validate([
            'title' => 'required|min:3',
            'code_name' => 'required',
            'no_of_times' => 'required'

        ]);

        $input      = $request->all();
        $result         = $promoCode::create($input);

        flash("Coupan And Promo Has Created Successfully!")->error();
        return back();
    }



    public function edit_coupon($id)
    {
        $coupan   = $this->_row($this->table, $id);
        return response()->json([
            'status'    =>  200,
            'coupan'    =>  $coupan
        ]);
    }

    public function update_coupon(Request $request, PromoCode $promocode)
    {
        $data_validation = $request->validate([
            'title'         => 'required|min:2',
            'code_name'     => 'required',
            'no_of_times'   => 'required',

        ]);
        $input  = $request->all();
        $update_coupan = PromoCode::find($request->id);
        $result = $update_coupan->fill($input)->save();


        flash("Coupon has been updated!")->success();
        return back();
    }


    


    public function delete_multiple_coupon($id)
    {

        $ids = $id;
        $ids = explode(",", $ids);
        $result = $this->_multiple_delete($this->table, $ids);

        flash("Selected Coupan has been deleted.")->success();
        return back();
    } */
}
