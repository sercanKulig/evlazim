<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeImages extends Model
{
    public function newhome()
    {
        return $this->belongsTo('App\NewHome', 'user_id');
    }
    protected $fillable = ['slug','file_name','file_size','file_mime','file_path','user_id','main'];
}
