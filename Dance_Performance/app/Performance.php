<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $fillable = ['title','date1','date2','price','venue_id','member','comment','category','image'];
    protected $casts = [
        'date1' => 'datetime:Y-m-d H:i',
        'date2' => 'datetime:Y-m-d H:i',
    ];
    public function venue(){
        return $this->belongsTo('App\Venue','venue_id','id');
    }
    public function book(){
        return $this0>belongsTo('App\Book','id','pfm_id');
    }
}
