<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticable as AuthenticableTrait;

class User extends Model implements Authenticatable
{

	use \Illuminate\Auth\Authenticatable;

	public function houses(){
		return $this->hasMany('App\House');
	}

	public function newfriend(){
		return $this->hasMany('App\NewFriend');
	}

	public function newhome(){
		return $this->hasMany('App\NewHome');
	}

	public function newrent(){
		return $this->hasMany('App\NewHome');
	}

    protected $table = 'users';

    protected $fillable =  ['adSoyad', 'dogumTarihi', 'cinsiyet', 'email', 'password'];
}
