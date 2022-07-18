<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Performance;


class AjaxController extends Controller
{
    public function more($number){
        $performance = new Performance;
        $all = $performance->where('category',0)->offset($number)->limit(10)->get();
       \Log::debug($number);
       $json = json_encode($all);
       return $json;
    }
}
