<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_settings', function (Blueprint $table) {
            $table->id();
            $table->string('setting_name')->nullable();
            $table->string('setting_value')->nullable();
            $table->timestamps();
        });
        $now = \Carbon\Carbon::now();
        DB::table('extra_settings')->insert(

            array(
                array('setting_name' => 'title', 'setting_value' => 'DSIN', 'created_at' => $now),
                array('setting_name' => 'site_logo', 'setting_value' => '', 'created_at' => $now),
                array('setting_name' => 'admin_logo', 'setting_value' => '', 'created_at' => $now),
                array('setting_name' => 'favicon', 'setting_value' => '', 'created_at' => $now),
                array('setting_name' => 'facebook_client_id', 'setting_value' => 'FACEBOOK_APP_ID', 'created_at' => $now),
                array('setting_name' => 'facebook_login_enable', 'setting_value' => 'off', 'created_at' => $now),
                array('setting_name' => 'facebook_client_secret', 'setting_value' => 'APP_SECRET', 'created_at' => $now),
                array('setting_name' => 'google_client_id', 'setting_value' => 'GOOGLE ID', 'created_at' => $now),
                array('setting_name' => 'google_login_enable', 'setting_value' => 'off', 'created_at' => $now),
                array('setting_name' => 'google_client_secret', 'setting_value' => 'GOOGLE SECRET', 'created_at' => $now),
                array('setting_name' => 'facebook_redirect_url', 'setting_value' => 'FACEBOOK_REDIRECT_URL', 'created_at' => $now),
                array('setting_name' => 'google_redirect_url', 'setting_value' => 'GOOGL_REDIRECT_URL', 'created_at' => $now),
                array('setting_name' => 'facebook_url', 'setting_value' => 'FACEBOOK_URL', 'created_at' => $now),
                array('setting_name' => 'twitter_url', 'setting_value' => 'TWITTER_URL', 'created_at' => $now),
                array('setting_name' => 'instagram_url', 'setting_value' => 'INSTAGRAM_URL', 'created_at' => $now),
                array('setting_name' => 'youtube_url', 'setting_value' => 'YOUTUBE_URL', 'created_at' => $now),
                array('setting_name' => 'linkedin_url', 'setting_value' => 'LINKEDIN_URL', 'created_at' => $now),
                array('setting_name' => 'footer_address', 'setting_value' => 'E-06-22, Block E, Sunway Geo Avenue, Jalan Lagoon Selatan, Sunway South Quay, Bandar Sunway, 47500, Subang Jaya', 'created_at' => $now),
                array('setting_name' => 'footer_phone', 'setting_value' => '+60 (2458-78556)', 'created_at' => $now),
                array('setting_name' => 'footer_email', 'setting_value' => 'info@dsin.com', 'created_at' => $now),
                array('setting_name' => 'footer_about', 'setting_value' => 'At DSIN Agility Sdn Bhd we continually strive to offer our valued customers superior office supplies products and a comprehensive range of Quality logistics services at lowest prices and utmost convenience', 'created_at' => $now),
                array('setting_name' => 'copy_right', 'setting_value' => 'COPYRIGHT', 'created_at' => $now),
                array('setting_name' => 'google_analytics', 'setting_value' => 'GOOGLE_ANALYTICS', 'created_at' => $now),
                array('setting_name' => 'google_adsense', 'setting_value' => 'GOOGLE_ADSENSE', 'created_at' => $now),
                array('setting_name' => 'custom_css', 'setting_value' => 'CUSTOM_CSS', 'created_at' => $now),
                array('setting_name' => 'custom_js', 'setting_value' => 'CUSTOM_JS', 'created_at' => $now),
                array('setting_name' => 'meta_keywords', 'setting_value' => 'META_KEYWORDS', 'created_at' => $now),
                array('setting_name' => 'meta_description', 'setting_value' => 'META_DESCRIPTION', 'created_at' => $now),
                array('setting_name' => 'thousand_separator', 'setting_value' => ',', 'created_at' => $now),
                array('setting_name' => 'decimal_separator', 'setting_value' => '.', 'created_at' => $now),
                array('setting_name' => 'is_decimal', 'setting_value' => 'on', 'created_at' => $now),
                array('setting_name' => 'currency_direction', 'setting_value' => 'RM', 'created_at' => $now),array('setting_name' => 'currency', 'setting_value' => 'RM', 'created_at' => $now),
                //PAYPAL
                array('setting_name' => 'paypal_status', 'setting_value' => '0', 'created_at' => $now),
                array('setting_name' => 'paypal_mode', 'setting_value' => '0', 'created_at' => $now),
                array('setting_name' => 'paypal_email', 'setting_value' => 'PAYPAL_EMAIL', 'created_at' => $now),
                array('setting_name' => 'paypal_merchant_id', 'setting_value' => 'paypal_merchant_id', 'created_at' => $now),
                array('setting_name' => 'paypal_client_id', 'setting_value' => 'paypal_client_id', 'created_at' => $now),
                array('setting_name' => 'paypal_secret_key', 'setting_value' => 'paypal_secret_key', 'created_at' => $now),
                array('setting_name' => 'paypal_callback_url', 'setting_value' => 'paypal_callback_url', 'created_at' => $now),
                //IPAY88
                array('setting_name' => 'ipay88_status', 'setting_value' => '0', 'created_at' => $now),
                array('setting_name' => 'ipay88_mode', 'setting_value' => '0', 'created_at' => $now),
                array('setting_name' => 'ipay88_merchant_id', 'setting_value' => 'ipay88_merchant_id', 'created_at' => $now),
                array('setting_name' => 'ipay88_client_id', 'setting_value' => 'ipay88_client_id', 'created_at' => $now),
                array('setting_name' => 'ipay88_secret_key', 'setting_value' => 'ipay88_secret_key', 'created_at' => $now),
                array('setting_name' => 'ipay88_callback_url', 'setting_value' => 'ipay88_callback_url', 'created_at' => $now),

                array('setting_name' => 'billplz_status', 'setting_value' => '0', 'created_at' => $now),
                array('setting_name' => 'billplz_mode', 'setting_value' => '0', 'created_at' => $now),
                array('setting_name' => 'billplz_merchant_id', 'setting_value' => 'billplz_merchant_id', 'created_at' => $now),
                array('setting_name' => 'billplz_client_id', 'setting_value' => 'billplz_client_id', 'created_at' => $now),
                array('setting_name' => 'billplz_secret_key', 'setting_value' => 'billplz_secret_key', 'created_at' => $now),
                array('setting_name' => 'billplz_callback_url', 'setting_value' => 'billplz_callback_url', 'created_at' => $now),

                array('setting_name' => 'stripe_status', 'setting_value' => 'disable', 'created_at' => $now),
                array('setting_name' => 'stripe_mode', 'setting_value' => 'sandbox', 'created_at' => $now),
                array('setting_name' => 'stripe_merchant_id', 'setting_value' => 'stripe_merchant_id', 'created_at' => $now),
                array('setting_name' => 'stripe_client_id', 'setting_value' => 'stripe_client_id', 'created_at' => $now),
                array('setting_name' => 'stripe_secret_key', 'setting_value' => 'stripe_secret_key', 'created_at' => $now),
                array('setting_name' => 'stripe_callback_url', 'setting_value' => 'stripe_callback_url', 'created_at' => $now),

                array('setting_name' => 'wallet_mode', 'setting_value' => 'disable', 'created_at' => $now),

            )

        );
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_settings');
    }
};
