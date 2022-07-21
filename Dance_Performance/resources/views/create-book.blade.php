@extends('layouts.layout')
<!-- 予約する チェックボックスを１つしか選べないようにしたい-->
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
        <p class="performance-text">日時：{{ $performance['date1']}}</p>
        @if(!empty($performance['date2']))
        <p class="performance-text">日時：{{ $performance['date2']}}</p>
        @else
        @endif
        <p class="performance-text">会場：{{ $performance['name']}}</p>
        <p class="performance-text">金額：{{ $performance['price']}}円</p>
        <p class="performance-text">出演者：{{ $performance['member']}}</p>
        <p class="performance-text">説明：{{ $performance['comment']}}</p>
    </div>
</div>
<div class="back-box">
    <a href="{{route('book.top')}}" class="back">＜　一覧に戻る</a>
</div>
<div>
                        <div>
                            @if($errors->any())
                            <div class='alert'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
<form action="{{ route('book.create',['performance' => $id ])}}" method="post" class="bookform">
                            @csrf
                            <label for='ticket' calss="bookform-text">チケット枚数</label>
                                <input type='text' class='form-ticket' name='ticket' value="{{ old('ticket') }}"/>
                            <label for='ticket' calss="bookform-text">日時</label>
                            <div class='book-date'>
                                    <input type="checkbox" name='date' value="{{ $performance['date1']}}">{{ $performance['date1']}}
                                    @if(!empty($performance['date2']))
                                    <input type="checkbox" name='date' value="{{ $performance['date2']}}">{{ $performance['date2']}}
                                    @else
                                    @endif
                            </div>
                            <input type="hidden" name='pfm_id' value="{{ $id }}">
                            <div class='row'>
                                <button type='submit' class='book-btn'>予約</button>
                            </div> 
                        </form>
</div>
@endsection