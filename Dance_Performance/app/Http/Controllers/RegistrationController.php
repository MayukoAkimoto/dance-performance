<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\CreateData;
use App\Http\Requests\CreateVenue;
use App\Http\Requests\CreateBook;
use App\Http\Requests\CreateComment;
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
    public function createPerformance(CreateData $request){
        $performance = new Performance;

        if(!empty($request->image)) {
            $dr = 'img';
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dr, $file_name);
        }

        $columns = ['title','date1','date2','venue_id','price','member','comment'];

        foreach($columns as $column){
            $performance->$column = $request->$column;
        }
        if(!empty($request->image)) {
            $performance->image = 'storage/' . $dr . '/' . $file_name;
        }
        $performance->save();

        return redirect('/');
    }
    //会場新規追加
    public function createVenueForm(){
        return view('create-venue');
    }
    public function createVenue(CreateVenue $request){
        $venue = new Venue;

        $venue->name = $request->name;

        $venue->save();

        return redirect('/create_performance');
    }
    //公演情報更新
    public function editPerformanceForm(Performance $performance){
        $id = $performance['id'];
        $performances = new Performance;
        $result = $performances->find($performance['id'])->toArray();
        $venue = new Venue;
        $params = $venue->all()->toArray();
        return view('edit-performance',[
            'id' => $id,
            'result' => $result,
            'venues' => $params,
        ]);
    }
    public function editPerformance(Performance $performance,CreateData $request){

        if(!empty($request->image)) {
            $dr = 'img';
            $file_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dr, $file_name);
        }
        $performances = new Performance;
        $record = $performances->find($performance['id']);
        $columns = ['title','date1','date2','venue_id','price','member','comment'];

        foreach($columns as $column){
            $record->$column = $request->$column;
        }
        if(!empty($request->image)) {
            $record->image = 'storage/' . $dr . '/' . $file_name;
        }
        $record->save();

        return redirect('/');
    }
    //公演の削除
    public function performanceDelete(Performance $performance){
        $performances = new Performance;
        $record = $performances->find($performance['id']);

        $record->delete();

        return redirect('/');

    }
    //過去公演に変更
    public function performanceCategory(Performance $performance){
        $performances = new Performance;
        $record = $performances->find($performance['id']);

        $record->update(['category'=> 1]);

        return redirect('/');

    }
    //写真を削除
    public function performanceImage(Performance $performance){
        $performances = new Performance;
        $record = $performances->find($performance['id']);

        $record->update(['image'=> null ]);

        return redirect('/');

    }
    //予約を編集
    public function editBookForm(Book $book){
        $id = $book['id'];
        $books = new Book;
        $performances = new Performance;
        $result = $books->join('users','books.user_id','users.id')->find($book['id'])->toArray();
        $performance = $performances->where('id',$result['pfm_id'])->get()->toArray();
        return view('edit-book',[
            'id' => $id,
            'result' => $result,
            'performance' => $performance,
        ]);
    }
    public function editBook(Book $book,CreateBook $request){
        $books = new Book;
        $record = $books->find($book['id']);
        $columns = ['pfm_id','user_id','ticket','date'];
        foreach($columns as $column){
            $record->$column = $request->$column;
        }
    
        $record->save();

        return redirect()->route('performance.detail', [$record['pfm_id']]);

    }
    //予約の削除
    public function bookDelete(Book $book){
        $books = new Book;
        $record = $books->find($book['id']);

        $record->delete();

        return redirect()->route('performance.detail', [$record['pfm_id']]);

    }
    
    //予約する
    public function createBookForm(Performance $performance){
        $id = $performance['id'];
        $performanceall = new Performance;
        $performances = $performanceall->join('venues','performances.venue_id','venues.id')->find($performance['id'])->toArray();
        return view('create-book',[
            'id' => $id,
            'performance' => $performances,
        ]);
    }
    public function createBook(Performance $performance,CreateBook $request){
        $book = new Book;

        $columns = ['pfm_id','ticket','date'];

        foreach($columns as $column){
            $book->$column = $request->$column;
        }
    
        Auth::user()->book()->save($book);//ログイン中のユーザーのIDをuser_idに入れてる

        return redirect()->route('book.detail', [$performance]);
    }
    //感想投稿
    public function createCommentForm(Performance $performance){
        $id = $performance;
        $performanceall = new Performance;
        $performances = $performanceall->find($performance['id'])->toArray();
        return view('create-comment',[
            'id' => $id,
            'performance' => $performances,
        ]);
    }
    public function createComment(Performance $performance,CreateComment $request){
        $comment = new Comment;
    
        $columns = ['pfm_id','comment'];
    
        foreach($columns as $column){
            $comment->$column = $request->$column;
        }
        
        Auth::user()->comment()->save($comment);//ログイン中のユーザーのIDをuser_idに入れてる
    
        return redirect()->route('comment.detail', [$performance]);
        }
    

}
