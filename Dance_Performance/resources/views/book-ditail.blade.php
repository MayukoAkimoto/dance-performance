@extends('layouts.layout')
<!-- 予約詳細画面 -->
@section('content')
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
<div class="btns">
    <a href="{{route('book.top')}}">＜　一覧に戻る</a>
    <a href="{{ route('book.create',['performance' => $performance['id'] ]) }}"><button class="btn">予約する</button></a>
</div>
@endsection
