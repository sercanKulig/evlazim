<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendImages extends Model
{
    public function newfriend()
    {
        return $this->belongsTo('App\NewFriend', 'user_id');
    }
    protected $fillable = ['slug','file_name','file_size','file_mime','file_path','user_id','main'];
}