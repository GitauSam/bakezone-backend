<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastry_images', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pastry_id');
            $table->foreign('pastry_id')->references('id')->on('pastries');
            $table->string('image_name');
            $table->string('image_url');
            $table->string('saved_image_name');
            $table->string('created_by');
            $table->string('modified_by')->default('admin');
            $table->string('deleted_by')->nullable();
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
        Schema::dropIfExists('pastry_images');
    }
}
