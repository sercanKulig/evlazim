<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newHomeComment extends Model
{
    public function newhome()
    {
        return $this->belongsTo('App\NewHome', 'post_id');
    }
    protected $fillable = ['user_id','user','post_id','yorum','block'];

    protected $guarded = ["id"];
}
