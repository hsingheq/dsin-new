<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use Hash;
use App\Models\User;
use App\Models\DealerProfiles;
use App\Mail\EmailDealerApprovalMailable;

class DealerController extends Controller
{
    public function users()
    {
        $data['users'] = User::where('roles', 'like', '%Dealer%')->get();
        return view('admin.users.dealer', $data);
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
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->roles    = json_encode($request->roles);
        $user->status   = $request->status;
        $result = $user->save();


        flash("Dealer has been added successfully!")->success();
        return back();
    }


    public function delete_user(Request $request)
    {
        $id     = $request->id;
        $result = $this->_delete('users', $id);

        flash("Dealer has been deleted successfully!")->success();
        return back();
    }



    public function delete_multiple_user(Request $request)
    {

        $ids    = $request->ids;
        $ids    = explode(",", $ids);
        $result = $this->_multiple_delete("users", $ids);

        flash("Selected Dealer has added successfully!")->success();
        return back();
    }



    public function edit_user($id)
    {

        $user    = DB::table('users')->where('id', $id)->get()->first();
        @$jroles = json_decode($user->roles, true);

        #empty values sending
        /*$admin    = '';
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
            <input  class='form-check-input' type='checkbox' value='Salesperson' name='roles[Salesperson]' {$salesperson}  ><label>Dealer</label>
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
        $user->first_name =  $request->first_name;
        $user->last_name =  $request->last_name;      
        $user->roles    = json_encode($request->roles);
        $user->status   = $request->status;
        $result         = $user->save();

        flash("Dealer has updated successfully!")->success();
        return back();
    }

    public function change_password(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'password'              => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $result = $user->save();
        flash("Password has updated successfully!")->success();
        return back();
    }

    public function pending_dealers_list() {
        $data['dealers'] = DealerProfiles::join('users', 'users.id', '=', 'dealer_profiles.user_id')->where('dealer_profiles.status','=', 'submitted')->get(['dealer_profiles.*', 'users.email']);
        return view('admin.dealers.pending-dealers', $data);
    }

    public function rejected_dealers_list() {
        $data['dealers'] = DealerProfiles::join('users', 'users.id', '=', 'dealer_profiles.user_id')->where('dealer_profiles.status','=', 'rejected')->get(['dealer_profiles.*', 'users.email']);
        return view('admin.dealers.rejected-dealers', $data);

    }
    public function approve_dealer (Request $request) {
        $id = $request->id;
        $dealer = DealerProfiles::join('users', 'users.id', '=', 'dealer_profiles.user_id')->where('dealer_profiles.user_id','=', $id)->get(['dealer_profiles.*', 'users.email'])->first();
        if($dealer) {
            $email = $dealer->email;
            $dealer->status = "approved";
            $dealer_user = User::find($dealer->user_id);
            $roles = json_decode($dealer_user->roles);
            $roles[]="Dealer";
            $dealer_user->roles = json_encode(array_unique($roles));
            $dealer_user->save();
            $dealer->save();
            $emailData = array(
                'id' => $id,
                'message'=> 'Your profile is approved and ready to use.'
            );
            $subject = "Dealer profile approved!";
            Mail::to($email)->send(new EmailDealerApprovalMailable($subject, $emailData));
            flash("Dealer is approved successfully!")->success();
            return redirect(route('admin.dealer'));   
        } else {
            flash("Invalid Dealer")->error();
            return redirect(route('admin.dealers.pending'));
        }
    }

    public function reject_dealer(Request $request) {
        $id = $request->id;
        $notes = $request->notes;
        $dealer = DealerProfiles::join('users', 'users.id', '=', 'dealer_profiles.user_id')->where('dealer_profiles.user_id','=', $id)->get(['dealer_profiles.*', 'users.email'])->first();
        $email = $dealer->email;
        $dealer->status = "rejected";
        $dealer->comment = $notes;
        $dealer_user = User::find($dealer->user_id);
        $roles = json_decode($dealer_user->roles);
        unset($roles['Dealer']);
        $dealer_user->roles = json_encode(array_unique($roles));
        $dealer_user->save();
        $dealer->save();
        $subject = "Dealer profile rejected!";
        $emailData = array(
            'id' => $id,
            'message'=> 'Your profile is rejected.'
        );
        flash("Dealer is rejected!")->success();
        Mail::to($email)->send(new EmailDealerApprovalMailable($subject, $emailData));
        return redirect(route('admin.dealers.pending'));
    }
}
