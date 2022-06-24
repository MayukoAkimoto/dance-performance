@extends('layouts.layout')
<!-- 公演予約のトップページ -->

@section('content')
<table class='table'>
    <thead>
        <tr>
            <th scope='col'>日付</th>
            <th scope='col'>タイトル</th>
            <th scope='col'>詳細</th>
         </tr>
    </thead>
    <tbody>
    @foreach($performances as $performance)
        <tr>
            <th scope='col'>{{ $performance['date1']}}{{ $performance['date2']}}</th>
            <th scope='col'>{{ $performance['title']}}</th>
            <th scope='col'>
                <a href="{{ route('book.detail',['id' => $performance['id']]) }}">詳細</a>
            </th>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection