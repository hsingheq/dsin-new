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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("category")->nullable();
            $table->string("slug")->nullable();
            $table->integer("parent_category")->default(0);
            $table->longText("category_image")->nullable();

            $table->timestamps();
        });


        /*   DB::table('categories')->insert(
            [
                'category'          => 'Uncategorized',
                'slug'              => 'Uncategorized',
                'parent_category'   => 0,
                'category_image'   => 0,


            ]
        ); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
