<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewRent extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function rent_pics(){
        return $this->hasMany('App\RentImages', 'user_id');
    }

    protected $table = 'new_rent';

    protected $fillable = [
        'user_id','baslik', 'fiyat' , 'ayrinti','kiralar_misin', 'sehir', 'ilce','acik_adres','ev',
        'esyali','kullanım_durumu','kat','yas','isitma','cephe','universite','sehir_merkezi','market','saglik_ocagi',
        'eczane','eglence','pazar','cami','spor_salonu','park','anayol',
        'cadde','otobüs','dolmuş','metro','tren','metrobüs','iskele','minibüs','teleferik','block','slug'
    ];

    protected $guarded = ['id'];
}
