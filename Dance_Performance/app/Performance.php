<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $fillable = ['title','date1','date2','price','venue_id','member','comment','category','image'];
    public function venue(){
        return $this->belongsTo('App\Venue','venue_id','id');
    }
}
