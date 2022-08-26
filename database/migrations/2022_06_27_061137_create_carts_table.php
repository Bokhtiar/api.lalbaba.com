<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cart_id');
            $table->integer('user_id')->nullable();
            $table->integer('product_id')->require();
            $table->string('product_name')->require();
            $table->string('product_image')->require();
            $table->string('product_price')->require();
            $table->string('property_id');
            $table->string('total_price')->nullable();
            $table->integer('order_id')->nullable();
            $table->string('ip_address');
            $table->integer('quantity')->default(1);
            $table->string('type')->require();
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
        Schema::dropIfExists('carts');
    }
}
