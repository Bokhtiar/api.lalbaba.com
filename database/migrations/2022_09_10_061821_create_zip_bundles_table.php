<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipBundlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_bundles', function (Blueprint $table) {
            $table->id('zip_bundle_id');
            $table->string('title')->require();
            $table->json('zip_codes')->require();
            $table->integer('price')->require();
            $table->longText('body')->nullable()->default('zip bundle body');
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
        Schema::dropIfExists('zip_bundles');
    }
}
