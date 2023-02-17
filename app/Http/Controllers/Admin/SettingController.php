<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MY_Controller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Permissions;
use DB;
use App\Models\ExtraSettings;
// use App\Repositories\SettingRepository;


class SettingController extends MY_Controller
{
    /* public $repository;
    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    } */




    public function social()
    {


        $data['setting'] = Settings::get()->first();

        return view('admin.settings.social', $data);
    }

    public function social_update(Request $request)
    {
        /*******************************
         * @  FACEBOOK SOCIAL UPDATE 
         *****************************/

        ServiceProvider::facebook_social_login($request);

        /***************************
         * @  GOOGLE SOCIAL UPDATE 
         **************************/

        ServiceProvider::google_social_login($request);

        flash("Settings updated successfully")->success();
        return back();
    }




    public function system_settings()
    {
        $data['setting'] = Settings::get()->first();


        return view('admin.settings.system', $data);
    }

    public function system_setting_update(Request $request)
    {

        /***************************
         * @ SOCIAL liNKS UPDATE 
         **************************/

        ServiceProvider::social_setting_update($request);

        /***************************
         * @ fOOTER SETTINGS UPDATE 
         **************************/

        ServiceProvider::footer_setting_update($request);
        /***************************
         * @ ADVANCE SETTINGS UPDATE 
         * @ GOOGLE ANALYTICS
         * @ GOOGLE ADSENSE
         **************************/

        ServiceProvider::advance_scripts($request);
        /************************************
         * @ CUSTOM JS/CSS/SETTINGS UPDATE 
         * @ JAVASCRIPT SETTING UPDATE
         * @ CSS SETTING UPDATE
         ***********************************/

        ServiceProvider::custom_js_css($request);

        /************************************
         * @ *SEO SETTINGS UPDATE*
         * @ TITLE
         * @ META KEYWORDS
         * @ META DESCRIPTIONS
         ***********************************/

        ServiceProvider::seo_update($request);

        /************************************
         * @ *SITE INFORMATION UPDATE*
         * @ CURRENCY
         * @ DECIMAL
         ***********************************/

        ServiceProvider::site_information($request);


        flash("Settings have been saved!")->success();
        return back();
    }


    public function system_email(Request $request)
    {
        $data['setting'] = Settings::get()->first();
        return view('admin.settings.email', $data);
    }

    public function system_email_update(Request $request)
    {
        //print_r($request->all());
        $id = $request->id;
        $social = Settings::find($id);
        $social->email_host            = $request->email_host;
        $social->email_port            = $request->email_port;
        $social->email_encryption      = $request->email_encryption;
        $social->email_user            = $request->email_user;
        $social->email_pass            = $request->email_pass;
        $social->email_from            = $request->email_from;
        $social->email_from_name     = $request->email_from_name;

        $result  =   $social->save();
        return $this->resultCheck($result, $msg = "Email Details have been Saved!");
    }


    public function all_permission()
    {
        $data['permissions'] = DB::table("permissions")->get();
        return view('admin.permission.all-permission', $data);
    }


    public function add_permission()
    {
        return view('admin.permission.add-permission');
    }

    public function store_permission(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $permission  = new Permissions();

        $permission->name = $request->name;
        if (empty($request->sections)) {
            $permission->sections = NULL;
        } else {
            $permission->sections = json_encode($request->sections);
        }

        $result = $permission->save();
        if ($result) {
            return redirect()->route('admin.all_permission')->with('succed', "Role & Permission has Added!");
        } else {

            return redirect()->route('admin.all_permission')->with('fail', "something went wrong!");
        }
    }

    public function edit_permission($id)
    {
        $data['permission'] = DB::table('permissions')->where('id', $id)->get()->first();
        return view('admin.permission.edit-permission', $data);
    }

    public function update_permission(Request $request)
    {
        $id = $request->id;
        $permission =    Permissions::find($id);
        $permission->name = $request->name;
        if (empty($request->sections)) {
            $permission->sections = NULL;
        } else {
            $permission->sections = json_encode($request->sections);
        }

        $result = $permission->save();
        if ($result) {
            return redirect()->route('admin.all_permission')->with('succed', "Role & Permission has updated!");
        } else {

            return redirect()->route('admin.all_permission')->with('fail', "something went wrong!");
        }
    }


    public function delete_permission($id)
    {
        $result = DB::table('permissions')->where('id', $id)->delete();
        return  $this->resultCheck($result, "Permission has Deleted!");
    }

    public function delete_multiple_permission($id)
    {

        $ids = $id;

        $ids = explode(",", $ids);

        /*  $result = $this->_multiple_delete("permissions", $ids); */
        $result = DB::table('permissions')->whereIn('id', $ids)->delete();
        return $this->resultCheck($result, "All selected permssions has been deleted.");
    }
}
