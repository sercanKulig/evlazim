<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newFriendComment extends Model
{
    public function newfriend()
    {
        return $this->belongsTo('App\NewFriend', 'post_id');
    }
    protected $fillable = ['user_id','user','post_id','yorum','block'];

    protected $guarded = ["id"];
}
