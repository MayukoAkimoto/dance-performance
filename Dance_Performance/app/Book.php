<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['pfm_id','user_id','date1','date2'];
    protected $casts = [
        'date' => 'datetime:Y-m-d H:i',
    ];
    public function pfm2(){
        return $this->belongsTo('App\Performance','pfm_id','id');
    }

}
