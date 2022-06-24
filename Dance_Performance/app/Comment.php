<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function pfm(){
        return $this->belongsTo('App\Performance','pfm_id','id');
    }

}
