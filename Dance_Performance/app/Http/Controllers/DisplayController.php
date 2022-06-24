<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Performance;
use App\Book;
use App\Comment;
use Illuminate\Support\Facades\DB;


class DisplayController extends Controller
{
    public function logout(){
        Auth::logout();
        return view('auth/login');
    }
    //管理者トップに公演の一覧を表示
    public function index(){
        $performance = new Performance;
        $all = $performance->all()->toArray();
        return view('maneger-top',[
            'performances' => $all,
        ]);
    }
    //予約状況画面に、公演の詳細を表示させる
    public function performanceDitail(int $performanceId){
        $performance = new Performance;
        $performance_with_venue = $performance
                                 ->join('venues','performances.venue_id','venues.id')->find($performanceId);
        $book = $performance->join('books','performances.id','books.pfm_id')->find($performanceId);
        var_dump($book);
        return view('maneger-ditail',[
            'performance' => $performance_with_venue,
        ]);

    }
    //一般ユーザートップ
    public function top(){
        return view('top');
    }
    //公演予約
    public function books(){
        $performance = new Performance;
        $all = $performance->where('category',0)->get();
        return view('book-top',[
            'performances' => $all,
        ]);

    }
    //感想
    public function comments(){
        $performance = new Performance;
        $all = $performance->where('category',1)->get();
        return view('comment-top',[
            'performances' => $all,
        ]);

    }
    //予約の詳細画面
    public function bookDitail(int $performanceId){
        $id = $performanceId;
        $performance = new Performance;
        $performance_with_venue = $performance
                                 ->join('venues','performances.venue_id','venues.id')->find($performanceId);
        return view('book-ditail',[
            'id' => $id,
            'performance' => $performance_with_venue,
        ]);
    }
    //感想の詳細画面
    public function commentDitail(int $performanceId){
        $id = $performanceId;
        $performance = new Performance;
        $comments = new Comment;
        $performance_with_venue = $performance
                                 ->join('venues','performances.venue_id','venues.id')->find($performanceId);
        $comment = $comments->join('users','comments.user_id','users.id')->where('pfm_id', $performanceId )->get()->toArray();
        return view('comment-ditail',[
            'id' => $id,
            'performance' => $performance_with_venue,
            'comments' => $comment,
        ]);
    }

}
