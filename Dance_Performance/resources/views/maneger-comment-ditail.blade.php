@extends('layouts.layout')
<!-- 感想詳細画面 -->
@section('content')
<div class="mng-container" >
    <a href="{{route('past')}}"><button id="mng-btn" >過去公演一覧へ</button></a>
</div>

<div class="performance">
    <div calss="performance-texts">
        <p class="performance-text">タイトル：{{ $performance['title']}}</p>
        <p class="performance-text">日時：{{ $performance['date1']}}</p>
        <p class="performance-text">日時：{{ $performance['date2']}}</p>
        <p class="performance-text">会場：{{ $performance['name']}}</p>
        <p class="performance-text">金額：{{ $performance['price']}}</p>
        <p class="performance-text">出演者：{{ $performance['member']}}</p>
        <p class="performance-text">説明：{{ $performance['comment']}}</p>
    </div>
    @if($performance['image'] == '' )
        <img src="{{ asset('storage/img/noimage.jpg') }}" class="image" >
    @else
        <img src="{{ asset($performance['image']) }}" calss="image" >
    @endif
</div>
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
@endsection