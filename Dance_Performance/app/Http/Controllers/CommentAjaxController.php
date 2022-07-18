<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;


class CommentAjaxController extends Controller
{
    public function commentmore($number){
        $comments = new Comment;
        $comment = $comments->join('users','comments.user_id','users.id')->where('pfm_id', $performance['id'] )->limit(5)->get()->toArray();
        \Log::debug($number);
        $json = json_encode($comment);
        return $json;
 
    }
}
