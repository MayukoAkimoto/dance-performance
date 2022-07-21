@extends('layouts.layout')
<!-- 予約編集画面 -->
@section('content')
@foreach($performance as $value)

<div class="pfm-ditail">
    <div class="pfm-image">
    @if($value['image'] == '' )
        <img src="{{ asset('storage/img/noimage.jpg') }}" id="pfm-img" >
    @else
        <img src="{{ asset($value['image']) }}" id="pfm-img" >
    @endif
    </div>
    <div class="pfm-text">
    <a href="{{ route('performance.detail',['performance' => $result['pfm_id']])}}" class="back-text">＜　戻る</a>
        <p class="pfm-title">{{ $value['title']}}</p>
        <p class="performance-text">日時：{{ $value['date1']}}</p>
        @if(!empty($performance['date2']))
        <p class="performance-text">日時：{{ $value['date2']}}</p>
        @else
        @endif
        <p class="performance-text">会場：{{ $value['name']}}</p>
        <p class="performance-text">金額：{{ $value['price']}}円</p>
        <p class="performance-text">出演者：{{ $value['member']}}</p>
        <p class="performance-text">説明：{{ $value['comment']}}</p>
    </div>
</div>
@endforeach
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
                            <div>
                            <div>
    <div class="editbook">
        <form action="{{ route('book.edit',['book' => $id ])}}" method="post" class="form">
        @csrf
            <label for='title' >・名前</label>
                {{$result['name']}}
            <label for='ticket' >・チケット枚数</label>
                <input type='text' class='' name='ticket' id='ticket' value="{{$result['ticket']}}"/>
            <label for='ticket' >・日時</label>
                <div>
                    @foreach($performance as $value)
                        <input type="checkbox" name='date' value="{{ $value['date1']}}:00">{{ $value['date1']}}
                        @if(!empty($value['date2']))
                        <input type="checkbox" name='date' value="{{ $value['date2']}}:00">{{ $value['date2']}}
                        @else
                        @endif
                    @endforeach
                </div>
                <input type='hidden' class='form-control' name='pfm_id' id='pfm_id' value="{{$result['pfm_id']}}"/>
                <input type='hidden' class='form-control' name='user_id' id='user_id' value="{{$result['user_id']}}"/>
            <div class='ed-btn-box'>
                    <button type='submit' class='ed-btn1'>情報を更新</button>
            </div> 
        </form>
        <a href="{{ route('delete.book',['book' => $id ])}}"><button class="ed-btn2">削除</button></a>
    </div>
</div>    
@endsection

