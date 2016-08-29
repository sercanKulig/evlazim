<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HousesTablosunaUserIdEkle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('new_friend', function($table){
            $table->string('baslik');
            $table->string('cinsiyet');
            $table->integer('elektrik');
            $table->integer('su');
            $table->integer('dogalgaz');
            $table->integer('internet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function($table){
           $table->dropColumn('user_id');
        });
    }
}
