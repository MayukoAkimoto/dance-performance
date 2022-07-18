@extends('layouts.layout')
<!-- 一般ユーザーのトップページ -->
@section('content')
<div class="top">
    <a href="{{ route('book.top')}}"><button id="top-button" >公演を予約する</button></a>
    <a href="{{ route('comment.top')}}"><button id="top-button" >公演の感想</button></a>
</div>
<div>
</div>
@endsection