@extends('layouts.layout')
<!--  感想投稿 -->
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
    <a href="{{route('comment.top')}}">＜　一覧に戻る</a>
<div class="comment-creat">
    <div>
        <div class='panel-body'>
                                @if($errors->any())
                                <div class='alert alert-danger'>
                                    <ul>
                                        @foreach($errors->all() as $message)
                                        <li>{{ $message }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
        </div>
        <form action="{{ route('comment.create',['performance' => $id ])}}" method="post" class="form">
                                @csrf
                                <label for='comment' class='mt-2'>感想</label>
                                    <textarea class='form-comment' name='comment'>{{ old('comment') }}</textarea>
                                <input type="hidden" name='pfm_id' value="{{ $performances['id'] }}">
                                <div class='row justify-content-center'>
                                <button type='submit' class='comment-btn'>投稿</button>
                                </div> 
        </form>
    </div>
    <table class="comment">
        <tbody>
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
        </tbody>
</div>
@endsection