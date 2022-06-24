@extends('layouts.layout')
<!-- 管理者の予約状況画面 -->
@section('content')
<p>{{ $performance['title']}}</p>
<p>{{ $performance['date1']}}</p>
<p>{{ $performance['date2']}}</p>
<p>{{ $performance['name']}}</p>
<p>{{ $performance['price']}}</p>
<p>{{ $performance['member']}}</p>
<p>{{ $performance['comment']}}</p>
@endsection
