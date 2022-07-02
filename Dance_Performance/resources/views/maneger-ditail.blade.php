@extends('layouts.layout')
<!-- 管理者の予約状況画面 -->
@section('content')
<div class="mng-container" >
    <a href="{{url('/')}}"><button id="mng-btn" >未実施公演一覧へ</button></a>
</div>

<div class="performance">
    <div calss="performance-texts">
        <p class="performance-text">タイトル：{{ $performance['title']}}</p>
        <p class="performance-text">日時：{{ $performance['date1']}}</p>
        <p class="performance-text">日時：{{ $performance['date2']}}</p>
        <p class="performance-text">会場：{{ $performance['name']}}</p>
        <p class="performance-text">金額：{{ $performance['price']}}</p>
        <p class="performance-text">出演者：{{ $performance['member']}}</p>
        <p class="performance-text">説明：{{ $performance['comment']}}</p>
    </div>
    @if($performance['image'] == '' )
        <img src="{{ asset('storage/img/noimage.jpg') }}" class="image" >
    @else
        <img src="{{ asset($performance['image']) }}" calss="image" >
    @endif
</div>
<table>
    <thead>
        <tr>
            <th>{{ $performance['date1']}}</th>
            <th>{{ $performance['date2']}}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($date1 as $ticket)
            <th>{{ $ticket['total_ticket'] }}</th>
            @endforeach
            @foreach($date2 as $ticket)
            <th>{{ $ticket['total_ticket'] }}</th>
            @endforeach
        </tr>
    </tbody>
</table>
<table class='table'>
    <thead>
        <tr>
            <th scope='col'>日付</th>
            <th scope='col'>名前</th>
            <th scope='col'>メールアドレス</th>
            <th scope='col'>チケット枚数</th>
            <th scope='col'>金額</th>
            <th scope='col'>更新</th>
         </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <th scope='col'>{{ $book['date']}}</th>
            <th scope='col'>{{ $book['name']}}</th>
            <th scope='col'>{{ $book['email']}}</th>
            <th scope='col'>{{ $book['ticket']}}</th>
            <th scope='col'>{{ $book['ticket'] * $performance['price']}}</th>
        @endforeach
        @foreach($bookid as $id)
            <th scope='col'>
                <a href="{{ route('book.edit',['book' => $id['id']])}}">更新</a>
            </th>
        </tr>
        @endforeach

    </tbody>

@endsection
