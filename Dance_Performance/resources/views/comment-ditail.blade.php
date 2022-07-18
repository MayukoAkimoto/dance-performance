@extends('layouts.layout3')
<!-- 感想詳細画面 -->
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
        <p class="pfm-title">{{ $performance['title']}}</p>
        <p class="performance-text">日時：{{ $performance['date1']->format('Y-m-d H:i')}}</p>
        <p class="performance-text">日時：{{ $performance['date2']->format('Y-m-d H:i')}}</p>
        <p class="performance-text">会場：{{ $performance['name']}}</p>
        <p class="performance-text">金額：{{ $performance['price']}}</p>
        <p class="performance-text">出演者：{{ $performance['member']}}</p>
        <p class="performance-text">説明：{{ $performance['comment']}}</p>
    </div>
</div>
<div class="btns">
    <a href="{{route('comment.top')}}">＜　一覧に戻る</a>
    <a href="{{ route('comment.create',['performance' => $performance['id'] ]) }}"><button class="com-btn">感想を投稿する</button></a>
</div>
<table class="comment">
    <tbody>
    <input type="hidden" id="count" value=5>

    @foreach($comments as $comment)
        <tr>
            <th scope='col' class="com">
                <div class="com-box">
                    <div class="com-icon-box">
                        @if($comment['image'] == '' )
                            <img src="{{ asset('storage/img/profile_icon.png') }}" id="com-icon" >
                        @else
                            <img src="{{ asset($comment['image']) }}" id="com-icon" >
                        @endif
                        <p class="com-name">{{ $comment['name']}}</p>
                    </div>
                    <div>
                        <p class="com-date">{{ $comment['created_at']}}</p>
                    </div>
                </div>
                <div>
                    <p class="com-com">{{ $comment['comment']}}</p>
                </div>
            </th>
        </tr>
    @endforeach
    <tr id="cintent"></tr>
    </tbody>
</table>
    <!--<button class="commentmore">もっと見る</button>-->
@endsection
