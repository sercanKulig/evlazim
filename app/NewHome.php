<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewHome extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function home_pics(){
        return $this->hasMany('App\HomeImages', 'user_id');
    }

    protected $table = 'new_home';

    protected $fillable = [
        'user_id','baslik', 'fiyat' , 'ayrinti','kiralar_misin', 'sehir', 'ilce','semt', 'acik_adres','ev',
        'esyali','kat','yas','isitma','cephe','universite','sehir_merkezi','market','saglik_ocagi',
        'eczane','eglence','pazar','cami','spor_salonu','park','anayol',
        'cadde','otobüs','dolmuş','metro','tren','metrobüs','iskele','minibüs','teleferik','block','slug'
    ];

    protected $guarded = ['id'];
}
