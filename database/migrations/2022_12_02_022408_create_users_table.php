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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('mobile')->nullable();
            $table->string('username')->nullable();
            $table->string('roles')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'first_name' => 'Sergio',
                'last_name'  => 'Marquina',
                'email'      => 'aa@aa.com',
                'password'   => '$2y$10$ghV78xsX5wEfYC5j6fhMdeIGIslp6WP7G0o3GSTUote2iB35M216m',
                'username'   => 'alex',
                'roles'      => '{"Admin":"Admin"}',
                'status'     => 'Active'
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
        Schema::dropIfExists('users');
    }
};
