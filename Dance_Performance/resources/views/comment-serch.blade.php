@extends('layouts.layout')
<!-- 公演感想の検索結果 -->
@section('content')
<div class="container">
    <h4 class="title" >公演の感想</h4>
</div>
<div id="serch">
    <form action="{{ route('book.serch') }}" method="GET" class="serch-form">
        <input type="text" name="keyword" value="" class="serch-box">
        <input type='date'  name='date' value="" class="serch-date">
        <input type="submit" value="検索" class="serch-bottun">
    </form>
</div>
<div class="menues">
    <a href="{{ route('comment.top') }}"><button class="menues-btn">＜　一覧に戻る</button></a>
    <a href="{{ route('book.top') }}"><button class="menues-btn">公演の予約をする　＞</button></a>
</div>
<table class='table'>
    <tbody>
    <input type="hidden" id="count" value=10>

    @foreach($posts as $post)
        <tr>
            <th scope='col' class="pfm">
                <div class="image">
                @if($post['image'] == '' )
                    <img src="{{ asset('storage/img/noimage.jpg') }}" id="img" >
                @else
                    <img src="{{ asset($post['image']) }}" id="img" >
                @endif
                </div>
                <div class="text">
                    <p class="title">{{ $post['title']}}</p>
                    <p class="date">{{ $post['date1']->format('Y-m-d H:i')}}</p>
                    <p class="date">{{ $post['date2']->format('Y-m-d H:i')}}</p>
                    <a href="{{ route('comment.detail',['performance' => $post['id']]) }}"><button class="book-btn">詳細</button></a>
                </div>
            </th>
        </tr>
    @endforeach
        <tr id="content"></tr>

    </tbody>
</table>
@endsection