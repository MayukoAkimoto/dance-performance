<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    public function performance(){
        return $this->belongsTo('App\Performance','id','venue_id');
    }
}
