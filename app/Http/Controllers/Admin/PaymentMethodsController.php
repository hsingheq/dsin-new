<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class PaymentMethodsController extends Controller
{
    public function index()
    {



        $data['setting'] = Settings::get()->first();
        return view('admin.ecommerce.paymentmethods.paymentmethods', $data);
    }
    public function payment_method_update(Request $request)
    {

        /*********************************
         * @ PAYPAL PAYMENT METHOD UPDATE 
         ********************************/

        ServiceProvider::paypal($request);

        /*********************************
         * @ IPAY88 PAYMENT METHOD UPDATE 
         ********************************/

        ServiceProvider::ipay88($request);

        /*********************************
         * @ BILLPLZ PAYMENT METHOD UPDATE 
         ********************************/

        ServiceProvider::billplz($request);

        /*********************************
         * @ STRIP PAYMENT METHOD UPDATE 
         ********************************/

        ServiceProvider::stripe($request);

        /*********************************
         * @ WALLET UPDATE 
         ********************************/

        ServiceProvider::wallet_mode($request);

        flash("Payment methods has updated successfully!")->success();
        return back();
    }
}
