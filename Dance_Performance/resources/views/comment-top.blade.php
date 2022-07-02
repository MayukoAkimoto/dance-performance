@extends('layouts.layout')
<!-- 感想のトップページ -->
@section('content')
<div class="container">
    <h4 class="title" >公演の感想</h4>
</div>
<div id="serch">
    <form action="{{ route('comment.serch') }}" method="GET" class="serch-form">
        <input type="text" name="keyword" value="" class="serch-box">
        <input type='date'  name='date' value="" class="serch-date">
        <input type="submit" value="検索" class="serch-bottun">
    </form>
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
    @foreach($performances as $performance)
        <tr>
            <th scope='col'>{{ $performance['date1']}}{{ $performance['date2']}}</th>
            <th scope='col'>{{ $performance['title']}}</th>
            <th scope='col'>
                <a href="{{ route('comment.detail',['performance' => $performance['id']]) }}">詳細</a>
            </th>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection