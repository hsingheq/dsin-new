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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('loader')->nullable();

            $table->string('feature_image')->nullable();

            $table->string('email_host')->nullable();
            $table->string('email_port')->nullable();
            $table->string('email_encryption')->nullable();
            $table->string('email_user')->nullable();
            $table->string('email_pass')->nullable();
            $table->string('email_from')->nullable();
            $table->string('email_from_name')->nullable();
           
            $table->string('google_analytics_id')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->tinyInteger('is_shop')->default(1)->nullable();
            $table->tinyInteger('is_blog')->default(1)->nullable();
            $table->tinyInteger('is_faq')->default(1)->nullable();
            $table->tinyInteger('is_contact')->default(1)->nullable();

            $table->string('facebook_client_id')->nullable();
            $table->string('facebook_client_secret')->nullable();
            $table->string('facebook_redirect')->nullable();

            $table->string('google_client_id')->nullable();
            $table->string('google_client_secret')->nullable();
            $table->string('google_redirect')->nullable();

            $table->string('footer_phone')->nullable();
            $table->text('footer_address')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('footer_gateway_img')->nullable();
            $table->text('social_link')->nullable();

            $table->string('satureday_start')->nullable();
            $table->string('satureday_end')->nullable();
            $table->string('copy_right')->nullable();
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('google_adsense')->nullable();

           


            $table->string('home_page_title')->nullable();
            $table->string('is_decimal')->nullable();
            $table->string('currency_direction')->nullable();
            $table->string('decimal_separator')->nullable();
            $table->string('thousand_separator')->nullable();
           


            $table->timestamps();
        });

        DB::table('settings')->insert(
            array(
                'title' => 'DSIN',
                'meta_keywords' => '[{"value":"Dsin"},{"value":"dsinignity"},{"value":"ecommerce"}]',
                'home_page_title' => 'Dsin',
                'social_link' => '["https:\/\/facebook.com","https:\/\/linkedin.com","https:\/\/twitter.com","https:\/\/youtube.com"]',
                
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
        Schema::dropIfExists('settings');
    }
};
