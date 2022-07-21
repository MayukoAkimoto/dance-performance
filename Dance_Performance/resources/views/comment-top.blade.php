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
<div class="menue">
    <a href="{{ route('book.top') }}"><button class="menue-btn">公演を予約する　＞</button></a>
</div>
<table class='table'>
<tbody>
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
                    <a href="{{ route('comment.detail',['performance' => $performance['id']]) }}"><button class="book-btn">詳細</button></a>
                </div>
            </th>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection