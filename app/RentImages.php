<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RentImages extends Model
{
    public function newrent()
    {
        return $this->belongsTo('App\NewRent', 'user_id');
    }
    protected $fillable = ['slug','file_name','file_size','file_mime','file_path','user_id','main'];
}
