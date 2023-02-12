<?php

namespace App\Repositories;

use DB;
use App\Repositories\Interfaces\Settinginterfacesrepository;

class SettingRepository implements Settinginterfacesrepository
{
    public static function setting($value)
    {
        $data = DB::table('extra_settings')->where('setting_name', $value)->get();
        foreach ($data as $da) {
            return $da->setting_value;
        }
    }
}
