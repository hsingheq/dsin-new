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
        Schema::create('flash_messages', function (Blueprint $table) {
            $table->id();
            $table->string('message_name')->nullable();
            $table->string('message_value')->nullable();
            $table->timestamps();
        });
        $now = \Carbon\Carbon::now();
        DB::table('flash_messages')->insert(

            array(
                array('message_name' => 'value_save', 'message_value' => 'Details have been saved!', 'created_at' => $now),
                array('message_name' => 'value_deleted', 'message_value' => 'Details have been Deleted!', 'created_at' => $now),
                array('message_name' => 'attribute_save', 'message_value' => 'Attribute have been saved Successfully!', 'created_at' => $now),
                array('message_name' => 'attribute_option_save', 'message_value' => 'Attribute option value have been deleted Successfully!', 'created_at' => $now),

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
        Schema::dropIfExists('flash_messages');
    }
};
