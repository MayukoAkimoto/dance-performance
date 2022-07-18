@extends('layouts.layout')
<!-- 予約編集画面 -->
@section('content')
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
        <form action="{{ route('book.edit',['book' => $id ])}}" method="post" class="form">
        @csrf
            <label for='title' class='mt-2'>名前</label>
                {{$result['name']}}
            <label for='ticket' class='mt-2'>チケット枚数</label>
                <input type='text' class='' name='ticket' id='ticket' value="{{$result['ticket']}}"/>
            <label for='ticket' class='mt-2'>日時</label>
                <div>
                    @foreach($performance as $value)
                        <input type="checkbox" name='date' value="{{ $value['date1']}}">{{ $value['date1']}}
                        <input type="checkbox" name='date' value="{{ $value['date2']}}">{{ $value['date2']}}
                    @endforeach
                </div>
                <input type='hidden' class='form-control' name='pfm_id' id='pfm_id' value="{{$result['pfm_id']}}"/>
                <input type='hidden' class='form-control' name='user_id' id='user_id' value="{{$result['user_id']}}"/>
                <div class='row justify-content-center'>
                    <button type='submit' class='edit-btn1'>情報を更新</button>
                </div> 
        </form>
    </div>
    <div class="edit-container">
        <a href="{{ route('delete.book',['book' => $id ])}}"><button class="edit-btn2">削除</button></a>
        <a href="{{ route('profile',['user' => Auth::user()->id])}}" class="back-text">＜　戻る</a>
    </div>
</div></div>
@endsection