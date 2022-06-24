@extends('layouts.layout')
<!-- 予約詳細画面 -->
@section('content')
<p>{{ $performance['title']}}</p>
<p>{{ $performance['date1']}}</p>
<p>{{ $performance['date2']}}</p>
<p>{{ $performance['name']}}</p>
<p>{{ $performance['price']}}</p>
<p>{{ $performance['member']}}</p>
<p>{{ $performance['comment']}}</p>
<a href="{{ route('book.create',['id' => $id ]) }}"><button>予約する</button></a>
@endsection
