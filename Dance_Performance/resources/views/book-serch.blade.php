@extends('layouts.layout')
<!-- 公演予約の検索結果 -->
@section('content')
<div class="container">
    <h4 class="title" >公演の予約をする</h4>
</div>
<div id="serch">
    <form action="{{ route('book.serch') }}" method="GET" class="serch-form">
        <input type="text" name="keyword" value="" class="serch-box">
        <input type='date'  name='date' value="" class="serch-date">
        <input type="submit" value="検索" class="serch-bottun">
    </form>
</div>
<div class="back" >
    <a href="{{route('book.top')}}" class="back-text" >＜　一覧に戻る</a>
</div>
<table class='table'>
    <thead>
        <tr>
            <th scope='col'>日付</th>
            <th scope='col'>タイトル</th>
            <th scope='col'>詳細</th>
         </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <th scope='col'>{{ $post['date1']}}{{ $post['date2']}}</th>
            <th scope='col'>{{ $post['title']}}</th>
            <th scope='col'>
                <a href="{{ route('book.detail',['performance' => $post['id']]) }}">詳細</a>
            </th>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection