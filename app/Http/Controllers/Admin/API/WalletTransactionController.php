<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class WalletTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function __construct()
    {
        $this->middleware('auth:api');
    }*/

    public function index()
    {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        $data = array();
        $data['balance'] = $user->balance;
        $wallet_id = $user->wallet->id;
        $data['transactions'] = $user->transactions->where('wallet_id','=', $wallet_id);
        return json_encode($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
            'type' => 'required'
        ]);

        $amount = $request->amount;
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();
        $info = array("via"=>'Add money');
        if ($request->type == 1) {
            $user->deposit($amount, $info);
            
        } elseif ($request->type == 2) {
            $user->withdraw($amount);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
