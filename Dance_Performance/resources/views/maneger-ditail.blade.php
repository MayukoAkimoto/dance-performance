@extends('layouts.layout')
<!-- 管理者の予約状況画面 -->
@section('content')
<div class="pfm-ditail">
    <div class="pfm-image">
    @if($performance['image'] == '' )
        <img src="{{ asset('storage/img/noimage.jpg') }}" id="pfm-img" >
    @else
        <img src="{{ asset($performance['image']) }}" id="pfm-img" >
    @endif
    </div>
    <div class="pfm-text">
        <a href="{{url('/')}}">＜　一覧に戻る</a>
        <p class="pfm-title">{{ $performance['title']}}</p>
        <p class="performance-text">日時：{{ $performance['date1']->format('Y-m-d H:i')}}</p>
        @if(!empty($performance['date2']))
        <p class="performance-text">日時：{{ $performance['date2']->format('Y-m-d H:i')}}</p>
        @else
        @endif
        <p class="performance-text">会場：{{ $performance['name']}}</p>
        <p class="performance-text">金額：{{ $performance['price']}}</p>
        <p class="performance-text">出演者：{{ $performance['member']}}</p>
        <p class="performance-text">説明：{{ $performance['comment']}}</p>
    </div>
</div>
</div>
<div class="ticket-box">
    <p class="ticket-box-text">チケット売上枚数</p>
    <div class="total-ticket">
        <div class="date1">
            <p>{{ $performance['date1']->format('Y-m-d H:i')}}</p>
            @foreach($date1 as $ticket)
            <p>{{ $ticket['total_ticket'] }}枚</p>
            @endforeach
        </div>
        @if(!empty($performance['date2']))
        <div class="date2">
            <p>{{ $performance['date2']->format('Y-m-d H:i')}}</p>
            @foreach($date2 as $ticket)
            <p>{{ $ticket['total_ticket'] }}枚</p>
            @endforeach
        </div>
        @else
        @endif
    </div>
</div>
<div class="ditail-box">
    <div class="ditail-1">
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>日付</th>
                    <th scope='col'>名前</th>
                    <th scope='col'>メールアドレス</th>
                    <th scope='col'>チケット枚数</th>
                    <th scope='col'>金額</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <th scope='col'>{{ $book['date']}}</th>
                    <th scope='col'>{{ $book['name']}}</th>
                    <th scope='col'>{{ $book['email']}}</th>
                    <th scope='col'>{{ $book['ticket']}}</th>
                    <th scope='col'>{{ $book['ticket'] * $performance['price']}}円</th>
                    <th><a href="{{ route('book.edit',['book' => $book['id']])}}">変更</a></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="ditail-2">
    </div>
</div>
@endsection