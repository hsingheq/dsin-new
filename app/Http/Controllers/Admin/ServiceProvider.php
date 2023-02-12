<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ServiceProvider extends Controller
{
    public static function getSetting($value)
    {
        $data = DB::table('extra_settings')->where('setting_name', $value)->get();
        foreach ($data as $da) {
            return $da->setting_value;
        }
    }

    public static function facebook_social_login(Request $request)
    {
        /*******************************
         * @  FACEBOOK SOCIAL UPDATE 
         * @ FOUR TYPES UPDATION SETTING 
         * 1. FACEBOOK LOGIN ENABLE
         * 2. FB CLIENT ID
         * 3. FB CLIENT SECRET
         * 4. FB REDIRECT URL
         *****************************/

        $facebook_login_enable = set_setting('facebook_login_enable');
        if ($request->has('facebook_login_enable')) {
            $facebook_login_enable->setting_value = $request->facebook_login_enable;
            $facebook_login_enable->save();
        } else {
            $facebook_login_enable->setting_value = "off";
            $facebook_login_enable->save();
        }



        $facebook_client_id =  set_setting('facebook_client_id');
        if ($request->has('facebook_client_id')) {
            $facebook_client_id->setting_value = $request->facebook_client_id;
            $facebook_client_id->save();
        }



        $facebook_client_secret = set_setting('facebook_client_secret');
        if ($request->has('facebook_redirect_url')) {
            $facebook_client_secret->setting_value = $request->facebook_client_secret;
            $facebook_client_secret->save();
        }




        $facebook_redirect_url = set_setting('facebook_redirect_url');
        if ($request->has('facebook_redirect_url')) {
            $facebook_redirect_url->setting_value = $request->facebook_redirect_url;
            $facebook_redirect_url->save();
        }
    }


    public static function google_social_login(Request $request)
    {
        /***************************
         * @  GOOGLE SOCIAL UPDATE 
         * @ FOUR TYPES UPDATION SETTING 
         * 1. GOOGLE LOGIN ENABLE
         * 2. GOOGLE CLIENT ID
         * 3. GOOGLE CLIENT SECRET
         * 4. GOOGLE REDIRECT URL
         *******************************/

        $google_login_enable = set_setting('google_login_enable');
        if ($request->has('google_login_enable')) {
            $google_login_enable->setting_value = $request->google_login_enable;
            $google_login_enable->save();
        } else {
            $google_login_enable->setting_value = "off";
            $google_login_enable->save();
        }



        $google_client_id =  set_setting('google_client_id');
        if ($request->has('google_client_id')) {
            $google_client_id->setting_value = $request->google_client_id;
            $google_client_id->save();
        }



        $google_client_secret = set_setting('google_client_secret');
        if ($request->has('google_client_secret')) {
            $google_client_secret->setting_value = $request->google_client_secret;
            $google_client_secret->save();
        }



        $google_redirect_url = set_setting('google_redirect_url');
        if ($request->has('google_client_secret')) {
            $google_redirect_url->setting_value = $request->google_redirect_url;
            $google_redirect_url->save();
        }
    }


    public static function social_setting_update(Request $request)
    {
        /*******************************
         * @  FACEBOOK SOCIAL URL UPDATE 
         * @ 5 TYPES UPDATION SETTING 
         * 1. FACEBOOK URL
         * 2. TWITTER CLIENT ID
         * 3. INSTAGRAM CLIENT SECRET
         * 4. YOUTUBE REDIRECT URL
         * 5. LINKEDIN REDIRECT URL
         *****************************/

        $facebook_url = set_setting('facebook_url');
        if ($request->has('facebook_url')) {
            $facebook_url->setting_value = $request->facebook_url;
            $facebook_url->save();
        }

        $twitter_url = set_setting('twitter_url');
        if ($request->has('twitter_url')) {
            $twitter_url->setting_value = $request->twitter_url;
            $twitter_url->save();
        }


        $instagram_url = set_setting('instagram_url');
        if ($request->has('instagram_url')) {
            $instagram_url->setting_value = $request->instagram_url;
            $instagram_url->save();
        }


        $youtube_url = set_setting('youtube_url');
        if ($request->has('youtube_url')) {
            $youtube_url->setting_value = $request->youtube_url;
            $youtube_url->save();
        }


        $linkedin_url = set_setting('linkedin_url');
        if ($request->has('linkedin_url')) {
            $linkedin_url->setting_value = $request->linkedin_url;
            $linkedin_url->save();
        }
    }


    public static function footer_setting_update(Request $request)
    {
        /*******************************
         * @  FOOTER SETTING UPDATE 
         * 1. FOOTER ADDRESS CHANGE
         * 2. FOOTER PHONE
         * 3. FOOTER EMAIL
         * 4. COPYRIGHT
         * 5. FOOTER ABOUT
         *****************************/

        $footer_address = set_setting('footer_address');
        if ($request->has('instagram_url')) {
            $footer_address->setting_value = $request->footer_address;
            $footer_address->save();
        }


        $footer_phone = set_setting('footer_phone');
        if ($request->has('instagram_url')) {
            $footer_phone->setting_value = $request->footer_phone;
            $footer_phone->save();
        }


        $footer_email = set_setting('footer_email');
        if ($request->has('instagram_url')) {
            $footer_email->setting_value = $request->footer_email;
            $footer_email->save();
        }


        $copy_right = set_setting('copy_right');
        if ($request->has('instagram_url')) {
            $copy_right->setting_value = $request->copy_right;
            $copy_right->save();
        }

        $footer_about = set_setting('footer_about');
        if ($request->has('footer_about')) {
            $footer_about->setting_value = $request->footer_about;
            $footer_about->save();
        }
    }
    public static function advance_scripts(Request $request)
    {

        /*******************************
         * @  ADVANCE SCRIPTS SETTING UPDATE 
         * 1. GOOGLE ANALYTICS 
         * 2. GOOGLE ADSENSE
         *****************************/

        $google_analytics = set_setting('google_analytics');
        if ($request->has('google_analytics')) {
            $google_analytics->setting_value = $request->google_analytics;
            $google_analytics->save();
        }


        $google_adsense = set_setting('google_adsense');
        if ($request->has('google_adsense')) {
            $google_adsense->setting_value = $request->google_adsense;
            $google_adsense->save();
        }
    }
    public static function custom_js_css(Request $request)
    {
        /*******************************
         * @  CUSTOM SETTING UPDATE 
         * 1. CUSTOM CSS  
         * 2. CUSTOM JS
         *****************************/

        $custom_css = set_setting('custom_css');
        if ($request->has('custom_css')) {
            $custom_css->setting_value = $request->custom_css;
            $custom_css->save();
        }


        $custom_js = set_setting('custom_js');
        if ($request->has('custom_js')) {
            $custom_js->setting_value = $request->custom_js;
            $custom_js->save();
        }
    }
    public static function seo_update(Request $request)
    {

        /*******************************
         * @  SEO UPDATE SECTIONS UPDATE
         * 1. TITLE CSS  
         * 2. META KEYWORDS 
         * 3. META DESCRIPTION
         *****************************/


        $title = set_setting('title');
        if ($request->has('title')) {
            $title->setting_value = $request->title;
            $title->save();
        }


        $meta_keywords = set_setting('meta_keywords');
        if ($request->has('meta_keywords')) {
            $meta_keywords->setting_value = $request->meta_keywords;
            $meta_keywords->save();
        }


        $meta_description = set_setting('meta_description');
        if ($request->has('meta_description')) {
            $meta_description->setting_value = $request->meta_description;
            $meta_description->save();
        }
    }

    public  static function site_information(Request $request)
    {

        /*******************************
         * @ SITE INFORMATION UPDATE
         * 1. THOUSAND SEPARATOR  
         * 2. DECIMAL SEPARATOR
         * 3. IS DECIAMAL 
         * 4. CURRENCY
         * 5. SITE LOGO
         * 6. ADMIN LOGO 
         * 7. FAVICON
         *****************************/

        $thousand_separator = set_setting('thousand_separator');
        if ($request->has('meta_description')) {
            $thousand_separator->setting_value = $request->thousand_separator;
            $thousand_separator->save();
        }


        $decimal_separator = set_setting('decimal_separator');
        if ($request->has('meta_description')) {
            $decimal_separator->setting_value = $request->decimal_separator;
            $decimal_separator->save();
        }

        $is_decimal = set_setting('is_decimal');
        if ($request->has('is_decimal')) {
            $is_decimal->setting_value = $request->is_decimal;
            $is_decimal->save();
        }

        $currency_direction = set_setting('currency_direction');
        if ($request->has('currency_direction')) {
            $currency_direction->setting_value = $request->currency_direction;
            $currency_direction->save();
        }


        $site_logo = set_setting('site_logo');
        if ($request->has('site_logo')) {
            $site_logo->setting_value = $request->site_logo;
            $site_logo->save();
        }


        $favicon = set_setting('favicon');
        if ($request->has('favicon')) {
            $favicon->setting_value = $request->favicon;
            $favicon->save();
        }


        $admin_logo = set_setting('admin_logo');
        if ($request->has('admin_logo')) {
            $admin_logo->setting_value = $request->admin_logo;
            $admin_logo->save();
        }
    }


    public static function paypal(Request $request)
    {

        /*******************************
         * @ PAYPAL METHODS UPDATE 
         * 1.PAYPAL STATUS
         * 2.PAYPAL MODE
         * 3.PAYPAL EMAIL
         * 4.PAYPAL MERCHANT ID
         * 5.PAYPAL CLIENT ID
         * 6.PAYPAL SECRET KEY
         * 7.PAYPAL REDIRECT URL
         *****************************/

        $paypal_status = set_setting('paypal_status');
        if ($request->has('paypal_status')) {
            $paypal_status->setting_value = $request->paypal_status;
            $paypal_status->save();
        } else {
            $paypal_status->setting_value = 'disable';
            $paypal_status->save();
        }



        $paypal_mode = set_setting('paypal_mode');
        if ($request->has('paypal_mode')) {
            $paypal_mode->setting_value = $request->paypal_mode;
            $paypal_mode->save();
        } else {
            $paypal_mode->setting_value = 'sandbox';
            $paypal_mode->save();
        }


        $paypal_email = set_setting('paypal_email');
        if ($request->has('paypal_email')) {
            $paypal_email->setting_value = $request->paypal_email;
            $paypal_email->save();
        }

        $paypal_merchant_id = set_setting('paypal_merchant_id');
        if ($request->has('paypal_merchant_id')) {
            $paypal_merchant_id->setting_value = $request->paypal_merchant_id;
            $paypal_merchant_id->save();
        }


        $paypal_client_id = set_setting('paypal_client_id');
        if ($request->has('paypal_client_id')) {
            $paypal_client_id->setting_value = $request->paypal_client_id;
            $paypal_client_id->save();
        }



        $paypal_secret_key = set_setting('paypal_secret_key');
        if ($request->has('paypal_secret_key')) {
            $paypal_secret_key->setting_value = $request->paypal_secret_key;
            $paypal_secret_key->save();
        }

        $paypal_callback_url = set_setting('paypal_callback_url');
        if ($request->has('paypal_callback_url')) {
            $paypal_callback_url->setting_value = $request->paypal_callback_url;
            $paypal_callback_url->save();
        }
    }

    public static function ipay88(Request $request)
    {
        /*******************************
         * @ IPAY88 METHODS UPDATE 
         * 1.IPAY88 STATUS
         * 2.IPAY88 MODE
         * 3.IPAY88 MERCHANT ID
         * 4.IPAY88 CLIENT ID
         * 5.IPAY88 SECRET KEY
         * 6.IPAY88 REDIRECT URL
         *****************************/

        $ipay88_status = set_setting('ipay88_status');
        if ($request->has('ipay88_status')) {
            $ipay88_status->setting_value = $request->ipay88_status;
            $ipay88_status->save();
        } else {
            $ipay88_status->setting_value = 'disable';
            $ipay88_status->save();
        }



        $ipay88_mode = set_setting('ipay88_mode');
        if ($request->has('ipay88_mode')) {
            $ipay88_mode->setting_value = $request->ipay88_mode;
            $ipay88_mode->save();
        } else {
            $ipay88_mode->setting_value = 'sandbox';
            $ipay88_mode->save();
        }




        $ipay88_merchant_id = set_setting('ipay88_merchant_id');
        if ($request->has('paypal_email')) {
            $ipay88_merchant_id->setting_value = $request->ipay88_merchant_id;
            $ipay88_merchant_id->save();
        }

        $ipay88_client_id = set_setting('ipay88_client_id');
        if ($request->has('ipay88_client_id')) {
            $ipay88_client_id->setting_value = $request->ipay88_client_id;
            $ipay88_client_id->save();
        }


        $ipay88_secret_key = set_setting('ipay88_secret_key');
        if ($request->has('ipay88_secret_key')) {
            $ipay88_secret_key->setting_value = $request->ipay88_secret_key;
            $ipay88_secret_key->save();
        }



        $ipay88_callback_url = set_setting('ipay88_callback_url');
        if ($request->has('ipay88_callback_url')) {
            $ipay88_callback_url->setting_value = $request->ipay88_callback_url;
            $ipay88_callback_url->save();
        }
    }

    public static function billplz(Request $request)
    {
        /*******************************
         * @ BILLPLZ METHODS UPDATE 
         * 1.BILLPLZ STATUS
         * 2.BILLPLZ MODE
         * 3.BILLPLZ MERCHANT ID
         * 4.BILLPLZ CLIENT ID
         * 5.BILLPLZ SECRET KEY
         * 6.BILLPLZ REDIRECT URL
         *****************************/

        $billplz_status = set_setting('billplz_status');
        if ($request->has('billplz_status')) {
            $billplz_status->setting_value = $request->billplz_status;
            $billplz_status->save();
        } else {
            $billplz_status->setting_value = 'disable';
            $billplz_status->save();
        }



        $billplz_mode = set_setting('billplz_mode');
        if ($request->has('billplz_mode')) {
            $billplz_mode->setting_value = $request->billplz_mode;
            $billplz_mode->save();
        } else {
            $billplz_mode->setting_value = 'sandbox';
            $billplz_mode->save();
        }




        $billplz_merchant_id = set_setting('billplz_merchant_id');
        if ($request->has('billplz_merchant_id')) {
            $billplz_merchant_id->setting_value = $request->billplz_merchant_id;
            $billplz_merchant_id->save();
        }

        $billplz_client_id = set_setting('billplz_client_id');
        if ($request->has('billplz_client_id')) {
            $billplz_client_id->setting_value = $request->billplz_client_id;
            $billplz_client_id->save();
        }


        $billplz_secret_key = set_setting('billplz_secret_key');
        if ($request->has('billplz_secret_key')) {
            $billplz_secret_key->setting_value = $request->billplz_secret_key;
            $billplz_secret_key->save();
        }



        $billplz_callback_url = set_setting('billplz_callback_url');
        if ($request->has('billplz_callback_url')) {
            $billplz_callback_url->setting_value = $request->billplz_callback_url;
            $billplz_callback_url->save();
        }
    }

    public static function stripe(Request $request)
    {
        /*******************************
         * @ STRIPE METHODS UPDATE 
         * 1.STRIPE STATUS
         * 2.STRIPE MODE
         * 3.STRIPE MERCHANT ID
         * 4.STRIPE CLIENT ID
         * 5.STRIPE SECRET KEY
         * 6.STRIPE REDIRECT URL
         *****************************/

        $stripe_status = set_setting('stripe_status');
        if ($request->has('stripe_status')) {
            $stripe_status->setting_value = $request->stripe_status;
            $stripe_status->save();
        } else {
            $stripe_status->setting_value = 'disable';
            $stripe_status->save();
        }



        $stripe_mode = set_setting('stripe_mode');
        if ($request->has('stripe_mode')) {
            $stripe_mode->setting_value = $request->stripe_mode;
            $stripe_mode->save();
        } else {
            $stripe_mode->setting_value = 'sandbox';
            $stripe_mode->save();
        }




        $stripe_merchant_id = set_setting('stripe_merchant_id');
        if ($request->has('stripe_merchant_id')) {
            $stripe_merchant_id->setting_value = $request->stripe_merchant_id;
            $stripe_merchant_id->save();
        }

        $stripe_client_id = set_setting('stripe_client_id');
        if ($request->has('stripe_client_id')) {
            $stripe_client_id->setting_value = $request->stripe_client_id;
            $stripe_client_id->save();
        }


        $stripe_secret_key = set_setting('stripe_secret_key');
        if ($request->has('stripe_secret_key')) {
            $stripe_secret_key->setting_value = $request->stripe_secret_key;
            $stripe_secret_key->save();
        }



        $stripe_callback_url = set_setting('stripe_callback_url');
        if ($request->has('stripe_callback_url')) {
            $stripe_callback_url->setting_value = $request->stripe_callback_url;
            $stripe_callback_url->save();
        }
    }

    public static function wallet_mode(Request $request)
    {

        /*******************************
         * @ WALLET MODE UPDATE 
         *****************************/

        $wallet_mode = set_setting('wallet_mode');
        if ($request->has('wallet_mode')) {
            $wallet_mode->setting_value = $request->wallet_mode;
            $wallet_mode->save();
        } else {
            $wallet_mode->setting_value = 'disable';
            $wallet_mode->save();
        }
    }
}
