<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastries', function (Blueprint $table) {
            $table->id();
            $table->string('pastry_name');
            $table->text('ingredients')->nullable();
            $table->string('cost_1kg')->nullable();
            $table->string('cost_2kg')->nullable();
            $table->string('cost_3kg')->nullable();
            $table->smallInteger('status')->default(0);
            $table->smallInteger('in_stock')->default(0);
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
        Schema::dropIfExists('pastries');
    }
}
