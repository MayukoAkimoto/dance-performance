@extends('layouts.layout')
<!-- 管理者のトップページ -->
@section('content')
<div class="mng-container" >
    <a href="{{route('performance.create')}}"><button id="mng-btn" >新規作成</button></a>
    <a href="{{route('past')}}"><button id="mng-btn" >過去公演一覧へ</button></a>
</div>
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
                <a href="{{ route('performance.detail',['performance' => $performance['id']])}}">詳細</a>
            </th>
            <th scope='col'>
                <a href="{{ route('performance.edit',['performance' => $performance['id']])}}">更新</a>
            </th>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection