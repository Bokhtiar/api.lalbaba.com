<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('f_name')->require();
            $table->string('l_name')->require();
            $table->string('email')->require();
            $table->string('phone')->require();
            $table->string('type')->require();
            $table->string('address_1')->require();
            $table->string('address_2')->require();
            $table->string('message')->require();
            $table->integer('user_id')->require();

            $table->tinyInteger('ordered')->default(0);
            $table->tinyInteger('packed')->default(0);
            $table->tinyInteger('out_for_delivery')->default(0);
            $table->tinyInteger('delivered')->default(0);
            $table->string('payment_number')->require();


            $table->string('payment_type')->require();
            $table->integer('payment_balance')->require();
            $table->string('referral_balance');
            $table->string('referral_type')->nullable();
            $table->string('total_balance')->require();

            $table->string('coupone_balance')->nullable();
            $table->string('coupone_code')->nullable();

            $table->string('delivery_charge')->nullable();
            $table->string('zip_code')->nullable();
            
            $table->string('aboundone_balance')->nullable();

            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
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
}
