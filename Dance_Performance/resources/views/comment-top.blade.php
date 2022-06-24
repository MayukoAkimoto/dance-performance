@extends('layouts.layout')
<!-- 感想のトップページ -->

@section('content')
<table class='table'>
    <thead>
        <tr>
            <th scope='col'>日付</th>
            <th scope='col'>タイトル</th>
            <th scope='col'>詳細</th>
            <th scope='col'>更新</th>
         </tr>
    </thead>
    <tbody>
    @foreach($performances as $performance)
        <tr>
            <th scope='col'>{{ $performance['date1']}}{{ $performance['date2']}}</th>
            <th scope='col'>{{ $performance['title']}}</th>
            <th scope='col'>
                <a href="{{ route('comment.detail',['id' => $performance['id']]) }}">詳細</a>
            </th>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection