@extends('layouts.layout')
<!-- 予約詳細画面 -->
@section('content')
<div class="pfm-ditail">
    <div class="pfm-image">
    @if($performance['image'] == '' )
        <img src="{{ asset('storage/img/noimage.jpg') }}" id="pfm-img" >
    @else
        <img src="{{ asset($performance['image']) }}" id="pfm-img" >
    @endif
    </div>
    <div class="pfm-text">
        <p class="pfm-title">{{ $performance['title']}}</p>
        <p class="performance-text">日時：{{ $performance['date1']->format('Y-m-d H:i')}}</p>
        <p class="performance-text">日時：{{ $performance['date2']->format('Y-m-d H:i')}}</p>
        <p class="performance-text">会場：{{ $performance['name']}}</p>
        <p class="performance-text">金額：{{ $performance['price']}}円</p>
        <p class="performance-text">出演者：{{ $performance['member']}}</p>
        <p class="performance-text">説明：{{ $performance['comment']}}</p>
    </div>
</div>
<div class="btns">
    <a href="{{route('book.top')}}">＜　一覧に戻る</a>
    <a href="{{ route('book.create',['performance' => $id ]) }}"><button class="book-btn">予約する</button></a>
</div>
@endsection