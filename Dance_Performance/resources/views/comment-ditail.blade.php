@extends('layouts.layout')
<!-- 感想詳細画面 -->
@section('content')
<p>{{ $performance['title']}}</p>
<p>{{ $performance['date1']}}</p>
<p>{{ $performance['date2']}}</p>
<p>{{ $performance['name']}}</p>
<p>{{ $performance['price']}}</p>
<p>{{ $performance['member']}}</p>
<p>{{ $performance['comment']}}</p>
<table class='table'>
    <thead>
        <tr>
            <th scope='col'>日付</th>
            <th scope='col'>名前</th>
            <th scope='col'>感想</th>
         </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <th scope='col'>{{ $comment['created_at']}}</th>
            <th scope='col'>{{ $comment['name']}}</th>
            <th scope='col'>{{ $comment['comment']}}</th>
        </tr>
    @endforeach
    </tbody>
<a href="{{ route('comment.create',['id' => $id ]) }}"><button>感想を投稿する</button></a>
@endsection
