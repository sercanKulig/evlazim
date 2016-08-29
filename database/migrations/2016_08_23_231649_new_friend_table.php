<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewFriendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_friend', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('cesit');
            $table->string('baslik');
            $table->string('fiyat');
            $table->string('cinsiyet');
            $table->string('neden');
            $table->integer('elektrik')->nullable();
            $table->integer('su')->nullable();
            $table->integer('dogalgaz')->nullable();
            $table->integer('internet')->nullable();
            $table->text('ayrinti');
            $table->string('sehir');
            $table->string('ilce');
            $table->text('acik_adres');
            $table->string('yatak')->nullable();
            $table->integer('gardorap')->nullable();
            $table->integer('komidin')->nullable();
            $table->integer('hali')->nullable();
            $table->integer('perde')->nullable();
            $table->integer('calisma_masasi')->nullable();
            $table->integer('sandalye')->nullable();
            $table->integer('lamba')->nullable();
            $table->integer('kitaplik')->nullable();
            $table->integer('ekstra_isitici')->nullable();
            $table->integer('ekstra_sogutucu')->nullable();
            $table->integer('evde_kalan')->nullable();
            $table->integer('oda_sayisi')->nullable();
            $table->string('isinma_cesidi')->nullable();
            $table->integer('oturma_odasi')->nullable();
            $table->integer('beyaz_esya')->nullable();
            $table->integer('mutfak_esya')->nullable();
            $table->integer('televizyon')->nullable();
            $table->string('tuvalet')->nullable();
            $table->integer('bina_yasi')->nullable();
            $table->integer('evin_kati')->nullable();
            $table->string('ev')->nullable();
            $table->string('cephe')->nullable();
            $table->integer('hayvan')->nullable();
            $table->integer('sigara')->nullable();
            $table->integer('alkol')->nullable();
            $table->integer('kalabalik')->nullable();
            $table->integer('site')->nullable();
            $table->integer('gorevli')->nullable();
            $table->integer('guvenlik')->nullable();
            $table->integer('otopark')->nullable();
            $table->integer('asansor')->nullable();
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
        Schema::drop('new_friend');
    }
}
