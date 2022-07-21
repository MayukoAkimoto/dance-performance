@extends('layouts.layout2')
<!-- 公演予約のトップページ -->
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
<div class="menue">
    <a href="{{ route('comment.top') }}"><button class="menue-btn">公演の感想を見る　＞</button></a>
</div>
<table class='table'>
    <tbody>
    <input type="hidden" id="count" value=10>

    @foreach($performances as $performance)
        <tr>
            <th scope='col' class="pfm">
                <div class="image">
                @if($performance['image'] == '' )
                    <img src="{{ asset('storage/img/noimage.jpg') }}" id="img" >
                @else
                    <img src="{{ asset($performance['image']) }}" id="img" >
                @endif
                </div>
                <div class="text">
                    <p class="title">{{ $performance['title']}}</p>
                    <p class="date">{{ $performance['date1']->format('Y-m-d H:i')}}</p>
                    @if(!empty($performance['date2']))
                    <p class="date">{{ $performance['date2']->format('Y-m-d H:i')}}</p>
                    @else
                    @endif
                    <a href="{{ route('book.detail',['performance' => $performance['id']]) }}"><button class="book-btn">詳細</button></a>
                </div>
            </th>
        </tr>
    @endforeach
        <tr id="content"></tr>

    </tbody>
</table>
<div class="morebox">
    <button class="mmm">もっと見る</button>
</div>

@endsection