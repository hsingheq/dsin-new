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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_title')->nullable();
            $table->longText('photos')->nullable();
            $table->longText('thumbnail_img')->nullable();
            $table->longText('variations')->nullable();
            $table->string('attributes')->nullable();
            $table->mediumText('choice_options')->nullable();
            $table->string('slug')->nullable();
            $table->longText('product_description')->nullable();
            $table->string('product_stocks')->default(0);
            $table->string('stock_status')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('product_dealer_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('discount_start_date')->nullable();
            $table->string('discount_end_date')->nullable();
            $table->string('variant_product')->nullable();
            $table->string('current_stock')->nullable();

            $table->string('product_brand')->nullable();
            $table->string('product_meta_title')->nullable();
            $table->string('product_meta_keywords')->nullable();
            $table->string('product_meta_description')->nullable();
            $table->string('product_status')->nullable();
            $table->string('product_visibility')->nullable();
            $table->string('product_category')->nullable();
            $table->string('product_tags')->nullable();
            $table->longText('product_short_description')->nullable();
            /*   $table->string('publishtime')->nullable(); */


            $table->timestamps();
        });

        /*  DB::table('products')->insert(array(
            'product_title' => 'demo'
        )); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
