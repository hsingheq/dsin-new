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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('product_id')->nullable();
            $table->text('review')->nullable();
            $table->string('subject')->nullable();
            $table->double('rating')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();
        });
        DB::table('reviews')->insert(
            array(
                'user_id' => 'Sergio',
                'product_id'  => '1',
                'review'      => 'Nice Product!',
                'rating'   => '4',
                'status'   => 'Active'
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
        Schema::dropIfExists('reviews');
    }
};
