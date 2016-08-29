<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewFriend extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function friend_pics(){
        return $this->hasMany('App\FriendImages', 'user_id');
    }

    public function new_friend_comments(){
        return $this->hasMany('App\NewFriendComment', 'post_id');
    }

    protected $table = 'new_friend';

    protected $fillable = [
        'baslik', 'cesit', 'fiyat', 'cinsiyet' , 'neden' ,'elektrik', 'su', 'dogalgaz', 'internet', 'ayrinti', 'sehir', 'ilce','acik_adres','yatak',
        'gardorap','komidin','hali','perde','calısma_masasi','sandalye','lamba','kitaplik','ekstra_isitici','ekstra_sogutucu',
        'evde_kalan','oda_sayisi','isinma_cesidi','oturma_odasi','beyaz_esya','mutfak_esya','televizyon', 'slug',
        'tuvalet','bina_yasi','evin_kati','ev','cephe','hayvan','sigara','alkol','kalabalik','site','gorevli','guvenlik','otopark','asansor','user_id',
    ];

    protected $guarded = ['id'];
}
