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
        $all = $performance->where('category',0)->get();
        return view('maneger-top',[
            'performances' => $all,
        ]);
    }
    //予約状況画面
    public function performanceDitail(Performance $performance){
        $performances = new Performance;
        $books = new Book;
        $performance_with_venue = $performances
                                 ->join('venues','performances.venue_id','venues.id')->find($performance['id']);
        $bookid = $books->where('pfm_id' , $performance['id'])->get()->toArray();
        $book = $books->join('users','books.user_id','users.id')->where('pfm_id' , $performance['id'])->get()->toArray();
        $date1 = $books->where([['pfm_id','=',$performance],['date','=',$performance_with_venue['date1']]] )
                        ->selectRaw('SUM(ticket) AS total_ticket')->get();
        $date2 = $books->where([['pfm_id','=',$performance],['date','=',$performance_with_venue['date2']]] )
                        ->selectRaw('SUM(ticket) AS total_ticket')->get();
        return view('maneger-ditail',[
            'performance' => $performance_with_venue,
            'books' => $book,
            'bookid' => $bookid,
            'date1' => $date1,
            'date2' => $date2,
        ]);

    }
    //管理者の過去公演一覧
    public function past(){
        $performance = new Performance;
        $all = $performance->where('category',1)->get();
        return view('maneger-past',[
            'performances' => $all,
        ]);
    }
    //管理者画面に感想の一覧
    public function pastcomment(Performance $performance){
        $performances = new Performance;
        $comments = new Comment;
        $performance_with_venue = $performances
                                 ->join('venues','performances.venue_id','venues.id')->find($performance['id']);
        $comment = $comments->join('users','comments.user_id','users.id')->where('pfm_id', $performance['id'])->get()->toArray();
        return view('maneger-comment-ditail',[
            'performance' => $performance_with_venue,
            'comments' => $comment,
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
    //予約の検索
    public function Bookserch(Request $request){
        $keyword = $request->input('keyword');
        $date = $request->input('date');

        $query = performance::query();

        if(!empty($keyword)) {
            $query->where('category',0)->where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('member', 'LIKE', "%{$keyword}%")->where('category',0);
        }
        if(!empty($date)) {
            $query->where('category',0)->where('date1', 'LIKE', "%{$date}%")
                    ->orWhere('date2', 'LIKE', "%{$date}%")->where('category',0);
        }

        $posts = $query->get();
        return view('book-serch',[
            'posts' => $posts,
        ]);

    }
    //予約の詳細画面
    public function bookDitail(Performance $performance){
        $id = $performance['id'];
        $performances = new Performance;
        $performance_with_venue = $performances
                                 ->join('venues','performances.venue_id','venues.id')->find($performance['id']);
        return view('book-ditail',[
            'id' => $id,
            'performance' => $performance_with_venue,
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
    //感想の検索
    public function Commentserch(Request $request){
        $keyword = $request->input('keyword');
        $date = $request->input('date');

        $query = performance::query();

        if(!empty($keyword)) {
            $query->where('category',1)->where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('member', 'LIKE', "%{$keyword}%")->where('category',1);
        }
        if(!empty($date)) {
            $query->where('category',1)->where('date1', 'LIKE', "%{$date}%")
                    ->orWhere('date2', 'LIKE', "%{$date}%")->where('category',0);
        }

        $posts = $query->get();
        return view('comment-serch',[
            'posts' => $posts,
        ]);

    }
    //感想の詳細画面
    public function commentDitail(Performance $performance){
        $performances = new Performance;
        $comments = new Comment;
        $performance_with_venue = $performances
                                 ->join('venues','performances.venue_id','venues.id')->find($performance['id']);
        $comment = $comments->join('users','comments.user_id','users.id')->where('pfm_id', $performance['id'] )->get()->toArray();
        return view('comment-ditail',[
            'performance' => $performance_with_venue,
            'comments' => $comment,
        ]);
    }

}
