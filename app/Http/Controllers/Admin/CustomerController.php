<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\User;
//customer controller
class CustomerController extends MY_Controller
{
    public function users()
    {
        $data['users'] = User::where('roles', 'like', '%Customer%')->get();
        return view('admin.users.customer', $data);
    }

    public function add_user(Request $request)
    {
        $user = new User();

        $request->validate([
            'email'                  => 'required|unique:users',
            'password'              => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'first_name' => 'required|min:3'
        ]);

        $user->email    = $request->email;
        $user->first_name =  $request->first_name;
        $user->last_name =  $request->last_name;
        $user->password = Hash::make($request->password);
        $user->roles    = json_encode($request->roles);
        $user->status   = $request->status;
        $result = $user->save();

        flash("Customer has added successfully!")->success();
        return back();
    }






    public function delete_user(Request $request)
    {
        $id     = $request->id;
        $result = $this->_delete('users', $id);

        flash("Customer has deleted successfully!")->success();
        return back();
    }



    public function delete_multiple_user(Request $request)
    {

        $ids    = $request->ids;
        $ids    = explode(",", $ids);
        $result = $this->_multiple_delete("users", $ids);

        flash("Selected Customer has added successfully!")->success();
        return back();
    }



    public function edit_user($id)
    {

        $user    = DB::table('users')->where('id', $id)->get()->first();
        @$jroles = json_decode($user->roles, true);

        /*#empty values sending
        $admin    = '';
        $dealer   = '';
        $customer = '';
        $salesperson   = '';

        if (array_key_exists('Admin', $jroles)) {
            $admin = 'checked';
        }
        if (array_key_exists('Dealer', $jroles)) {
            $dealer = 'checked';
        }

        if (array_key_exists('Customer', $jroles)) {
            $customer = 'checked';
        }

        if (array_key_exists('Salesperson', $jroles)) {
            $salesperson = 'checked';
        }

        if (in_array('Admin', $jroles)) {
            $admin = 'checked';
        }



        $value = "<div id=''>
       <div class='form-check form-check-inline'>
       <input  class='form-check-input' type='checkbox'  {$admin} value='Admin' name='roles[Admin]' ><label>Admin</label></div>
       <div class='form-check form-check-inline'>
       <input  class='form-check-input' type='checkbox' value='Dealer' {$dealer} name='roles[Dealer]' >
        <label>Dealer</label> </div>
        <div class='form-check form-check-inline'>
        <input  class='form-check-input' type='checkbox' value='Customer' name='roles[Customer]' {$customer}  ><label>Customer</label>
        </div>
            <div class='form-check form-check-inline'>
            <input  class='form-check-input' type='checkbox' value='Salesperson' name='roles[Salesperson]' {$salesperson}  ><label>Sales Person</label>
            </div>
       
        </div>";
        */

        return response()->json([
            'status' => 200,
            'user'   => $user,
            'roles' => $user->roles,
        ]);
    }


    public function get_change_password($id)
    {

        $user = $this->_row('users', $id);
        return response()->json([
            'status' => 200,
            'user'   => $user
        ]);
    }

    public function update_user(Request $request)
    {


        $id             = $request->id;
        $user           = User::find($id);
        $user->email    = $request->email;
        $user->first_name =  $request->first_name;
        $user->last_name =  $request->last_name;
        $user->roles    = json_encode($request->roles);
        $user->status   = $request->status;
        $result         = $user->save();

        flash("Customer has updated successfully!")->success();
        return back();
    }

    public function change_password(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $result = $user->save();
        flash("Password has updated successfully!")->success();
        return back();
    }
}
