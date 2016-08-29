<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableNewrentpic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('main')->nullable();
            $table->string('slug');
            $table->string('file_name');
            $table->string('file_size', 10);
            $table->string('file_mime', 50);
            $table->string('file_path');
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
        Schema::drop('rent_images');
    }
}
