<?php

namespace App\Http\Controllers\Admin\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\DealerProfiles;
use App\Mail\AdminEmailDealerRegistrationMailable;
use DB;
use App\Models\ExtraSettings;

class DealerRegistrationApiController extends Controller
{
    //
    public function store(Request $request) {
        //identity_number is used as NRIC/Company registration no.
        $adminEmail =  ExtraSettings::where('setting_name', '=', 'footer_email')->get()->first();
        $dealer_status = "submitted";
        $user_id = 4;
        $user = User::find($user_id);
        $email = $adminEmail->setting_value;
        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => "Invalid user."
            ], 422);
        }
        $dealer = DealerProfiles::where('user_id','=', $user_id)->first();
        if($dealer) {
            return response()->json([
                'success' => false,
                'message' => 'Delaer Profile is submitted already.'
            ], 422);
        }
        if($request->registration_type == "individual"){
            
            $data = array(
                'registration_type' => $request->registration_type,
                'first_name'=> $request->first_name,
                'last_name'=> $request->last_name,
                'identity_number' => $request->nric_no,
                'address' => $request->address,
                'mobile_number' => $request->mobile,
                'occupation' => $request->occupation,
                'notes' => $request->notes,
                'acceptance' => $request->acceptance,
            );
            $dealer_profile = new DealerProfiles();
            $dealer_profile->user_id = $user_id;
            $dealer_profile->data = json_encode($data);
            $dealer_profile->status = "submitted";
            $dealer_profile->save();

        } else if($request->registration_type == "company"){
            
            $data = array(
                'registration_type' => $request->registration_type,
                'company_name'=> $request->company_name,
                'identity_number' => $request->company_registration_no,
                'address' => $request->address,
                'mobile_number' => $request->mobile,
                'occupation' => $request->occupation,
                'notes' => $request->notes,
                'acceptance' => $request->acceptance,
            );
            $dealer_profile = new DealerProfiles();
            $dealer_profile->user_id = $user_id;
            $dealer_profile->data = json_encode($data);
            $dealer_profile->status = "submitted";
            $dealer_profile->save();
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Not allowed.'
            ], 422);            
        }

        Mail::to($email)->send(new AdminEmailDealerRegistrationMailable($data));
        return response()->json([
            'success' => true,
            'message' => 'Your dealer application has been submitted successfully. Please wait admin will verify.'
        ], 200);
    }
}
