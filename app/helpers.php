<?php

use App\Models\ExtraSettings;
use App\Models\FlashMessage;
use App\Models\Category;
//use App\Models\Brands;

function _na($value)
{
    if (empty($value) || is_null($value)) {
        return 'N/A';
    }
}

/* function alert($msg)
{
    echo "<script>alert(" . $msg . ");</script>";
} */

function sets($val)
{
    if (isset($val)) {
        return $val;
    } else {
        return '';
    }
}

function is_route($url)
{
    //removing first slash form string and return clean route without domain name.
    return  ltrim(route($url, [], false), '/');
}

function geters()
{
    echo "sd";
}

function uploadpath()
{
    return "uploads/all/";
}

function time_ago($vals)
{
    return Carbon\Carbon::parse($vals)->diffForHumans();
}


function translate($vals)
{
    return $vals;
}

function set_setting($key)
{
    return  ExtraSettings::where('setting_name', $key)->first();
}


function get_setting($key, $default = null)
{
    $settings = ExtraSettings::all();
    $setting = $settings->where('setting_name', $key)->first();
    return $setting == null ? $default : $setting->setting_value;
}


function get_msg($key, $default = null)
{
    $message = FlashMessage::all();
    $message = $message->where('message_name', $key)->first();
    return $message == null ? $default : $message->message_value;
}

function flashback($value)
{
    flash(get_msg($value))->success();
    return back();
}

function product_path($id, $image)
{
    return asset('images/uploads/products/' . $id . '/' . $image);
}

//return file uploaded via uploader
if (!function_exists('get_uploaded_image_url')) {
    function get_uploaded_image_url($id)
    {
        if (($asset = \App\Models\Upload::find($id)) != null) {
            return my_asset($asset->file_name);
        }
        return null;
    }
}

function uploaded_id($id)
{
    if (($asset = \App\Models\Upload::find($id)) != null) {
        return $asset->id;
    }
    return null;
}



function getparentcatname($id)
{
    if (($asset = \App\Models\Category::find($id)) != null) {
        return $asset->category;
    }
    return "none";
}




if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return env('APP_URL') . '/';
        } else {
            return getBaseURL() . '';
        }
    }
}

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = (isHttps() ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $root;
    }
}
if (!function_exists('isHttps')) {
    function isHttps()
    {
        return !empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']);
    }
}


if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        if (env('FILESYSTEM_DRIVER') == 's3') {
            return Storage::disk('s3')->url($path);
        } else {
            //  return app('url')->asset('public/' . $path, $secure);
            return app('url')->asset('/' . $path, $secure);
        }
    }
}

if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}

//return product category details
if (!function_exists('get_product_category_by_id')) {
    function get_product_category_by_id($id)
    {
        if (($category = \App\Models\Category::find($id)) != null) {
            return $category;
        }
        return null;
    }
}

//return product brand details
if (!function_exists('get_product_brand_by_id')) {
    function get_product_brand_by_id($id)
    {
        if (($brand = \App\Models\Brands::find($id)) != null) {
            return $brand;
        }
        return null;
    }
}