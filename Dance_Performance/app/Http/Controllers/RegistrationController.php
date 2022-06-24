<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Venue;
use App\Performance;
use App\Book;
use App\Comment;
use Illuminate\Support\Facades\DB;


class RegistrationController extends Controller
{
    //公演新規追加画面に会場を表示
    public function createPerformanceForm(){
        $venue = new Venue;
        $params = $venue->all()->toArray();
        return view('create-performance',[
            'venues'=> $params,
        ]);
    }
    //公演新規追加
    public function createPerformance(Request $request){
        $performance = new Performance;

        $columns = ['title','date1','date2','venue_id','price','member','comment'];

        foreach($columns as $column){
            $performance->$column = $request->$column;
        }
    
        $performance->save();

        return redirect('/');
    }
    //会場新規追加
    public function createVenueForm(){
        return view('create-venue');
    }
    public function createVenue(Request $request){
        $venue = new Venue;

        $venue->name = $request->name;

        $venue->save();

        return redirect('/create_performance');
    }
    //公演情報更新
    public function editPerformanceForm(int $performanceId){
        $id = $performanceId;
        $performance = new Performance;
        $result = $performance->find($performanceId)->toArray();
        $venue = new Venue;
        $params = $venue->all()->toArray();
        return view('edit-performance',[
            'id' => $id,
            'result' => $result,
            'venues' => $params,
        ]);
    }
    public function editPerformance(int $performanceId,Request $request){
        $performance = new Performance;
        $record = $performance->find($performanceId);
        $columns = ['title','date1','date2','venue_id','price','member','comment'];

        foreach($columns as $column){
            $record->$column = $request->$column;
        }
    
        $record->save();

        return redirect('/');
    }
    //公演の削除
    public function performanceDelete(int $performanceId){
        $performance = new Performance;
        $record = $performance->find($performanceId);

        $record->delete();

        return redirect('/');

    }
    //過去公演に変更
    public function performanceCategory(int $performanceId){
        $performance = new Performance;
        $record = $performance->find($performanceId);

        $record->update(['category'=> 1]);

        return redirect('/');

    }
    //予約する
    public function createBookForm(int $performanceId){
        $id = $performanceId;
        $performances = new Performance;
        $performance = $performances->join('venues','performances.venue_id','venues.id')->find($performanceId)->toArray();
        return view('create-book',[
            'id' => $id,
            'performance' => $performance,
        ]);
    }
    public function createBook(Request $request){
        $book = new Book;

        $columns = ['pfm_id','ticket','date'];

        foreach($columns as $column){
            $book->$column = $request->$column;
        }
    
        Auth::user()->book()->save($book);//ログイン中のユーザーのIDをuser_idに入れてる

        return redirect('/book-top');
    }
    //感想投稿
    public function createCommentForm(int $performanceId){
        $id = $performanceId;
        $performances = new Performance;
        $performance = $performances->find($performanceId)->toArray();
        return view('create-comment',[
            'id' => $id,
            'performance' => $performance,
        ]);
    }
    public function createComment(Request $request){
        $comment = new Comment;
    
        $columns = ['pfm_id','comment'];
    
        foreach($columns as $column){
            $comment->$column = $request->$column;
        }
        
        Auth::user()->comment()->save($comment);//ログイン中のユーザーのIDをuser_idに入れてる
    
        return redirect('/comment-top');
    }
    

}
