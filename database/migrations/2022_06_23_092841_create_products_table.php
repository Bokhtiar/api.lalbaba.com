<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('name')->require();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->string('category_name');
            $table->string('regular_price')->require();
            $table->string('discount_price')->nullable();
            $table->string('discount_percent')->nullable();
            $table->string('discount_tag')->nullable();
            $table->longText('body')->require();
            $table->string('image')->require();
            $table->string('type')->default('24/7');
            $table->integer('quantity')->default(1);
            $table->integer('alert_quantity')->default(1);
            $table->json('properties');
            $table->string('product_unit');
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
        Schema::dropIfExists('products');
    }
}
