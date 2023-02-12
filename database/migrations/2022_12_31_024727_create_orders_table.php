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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->text('cart')->nullable();
            $table->string('currency_sign')->nullable();
            $table->string('currency_value')->nullable();
            $table->text('discount')->nullable();
            $table->text('shipping')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('txnid')->nullable();
            $table->string('charge_id')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('order_status')->nullable();
            $table->text('shipping_info')->nullable();
            $table->text('billing_info')->nullable();
            $table->string('payment_status')->nullable();
            $table->timestamps();
        });
        DB::table('orders')->insert(
            array(
                'user_id' => 'Sergio',
                'payment_method'  => 'STRIPE',
                'txnid'      => '34KLF09F2W',
                'transaction_number'   => '56789',
                'order_status'   => 'Active',
                'payment_status'      => 'Paid'
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
        Schema::dropIfExists('orders');
    }
};
