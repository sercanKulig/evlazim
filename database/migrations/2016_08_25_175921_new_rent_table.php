<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewRentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_rent', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('baslik');
            $table->string('cesit');
            $table->integer('fiyat');
            $table->text('ayrinti')->nullable();
            $table->integer('kiralar_misin')->nullable();
            $table->string('sehir');
            $table->string('ilce');
            $table->text('acik_adres');
            $table->integer('ev')->nullable();
            $table->integer('esyali')->nullable();
            $table->integer('kullanım_durumu')->nullable();
            $table->integer('oda_sayisi')->nullable();
            $table->integer('kat')->nullable();
            $table->integer('yas')->nullable();
            $table->string('isitma')->nullable();
            $table->integer('cephe')->nullable();
            $table->integer('universite')->nullable();
            $table->integer('sehir_merkezi')->nullable();
            $table->integer('market')->nullable();
            $table->integer('saglik_ocagi')->nullable();
            $table->integer('eczane')->nullable();
            $table->integer('eglence')->nullable();
            $table->integer('pazar')->nullable();
            $table->integer('cami')->nullable();
            $table->integer('spor_salonu')->nullable();
            $table->integer('park')->nullable();
            $table->integer('anayol')->nullable();
            $table->integer('cadde')->nullable();
            $table->integer('otobüs')->nullable();
            $table->integer('dolmuş')->nullable();
            $table->integer('metro')->nullable();
            $table->integer('tren')->nullable();
            $table->integer('metrobüs')->nullable();
            $table->integer('iskele')->nullable();
            $table->integer('minibüs')->nullable();
            $table->integer('teleferik')->nullable();
            $table->integer('block')->nullable();
            $table->string('slug');
            $table->string('remember_token');
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
        Schema::drop('new_rent');
    }
}
