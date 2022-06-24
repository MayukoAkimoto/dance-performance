@extends('layouts.layout')
<!-- 一般ユーザーのトップページ -->

@section('content')
<a href="{{ route('book.top')}}"><button>公演を予約する</button></a>
<a href="{{ route('comment.top')}}"><button>公演の感想</button></a>
@endsection