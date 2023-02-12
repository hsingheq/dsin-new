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
        Schema::create('attribute_options', function (Blueprint $table) {
            $table->id();
            $table->integer('attribute_id')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
        });
        DB::table('attribute_options')->insert(
            array(
                array('attribute_id' => '1', 'value' => 'red'),
                array('attribute_id' => '1', 'value' => 'black'),

                array('attribute_id' => '2', 'value' => 'xl'),
                array('attribute_id' => '2', 'value' => 'l'),

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
        Schema::dropIfExists('attribute_options');
    }
};
