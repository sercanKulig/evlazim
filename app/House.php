<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
	public function user(){
		return $this->belongsTo('App\User');
	}

	protected $table = 'houses'; 

    protected $fillable = [
        'il', 'ilce' , 'mahalle','odaSayisi','cinsiyet','baslik','ayrinti','slug'
    ];
}
