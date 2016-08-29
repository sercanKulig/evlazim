<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newRentComment extends Model
{
    public function newrent()
    {
        return $this->belongsTo('App\NewRent', 'post_id');
    }
    protected $fillable = ['user_id','user','post_id','yorum','block'];

    protected $guarded = ["id"];
}
