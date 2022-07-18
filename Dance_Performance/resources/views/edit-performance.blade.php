@extends('layouts.layout')
<!-- 管理者の公演更新画面 -->
@section('content')
<div class="pfm-ditail">
    <div class="pfm-image">
    @if($result['image'] == '' )
        <img src="{{ asset('storage/img/noimage.jpg') }}" id="pfm-img" >
    @else
        <img src="{{ asset($result['image']) }}" id="pfm-img" >
    @endif
    <a href="{{url('/')}}">＜　一覧に戻る</a>

</div>
<div class="pfm-text">
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
    <form action="{{ route('performance.edit',['performance' => $id ])}}" enctype="multipart/form-data" method="post" class="form">
                            @csrf
                            <label for='title'>タイトル</label>
                                <input type='text' class='form-control' name='title' value="{{$result['title']}}"/>
                            <label for='date1' class='mt-2'>日付</label>
                                <input type='datetime-local' class='form-control' name='date1' id='date1' value="{{$result['date1']}}"/>
                            <label for='date2' class='mt-2'>日付</label>
                                <input type='datetime-local' class='form-control' name='date2' id='date2' value="{{$result['date2']}}"/>
                            <label for='price' class='mt-2'>金額</label>
                                <input type='text' class='form-control' name='price' value="{{$result['price']}}"/>
                            <label for='venue' class='mt-2'>会場</label>
                            <select name='venue_id' class='form-control'>
                                <option value='' hidden>会場名</option>
                                @foreach($venues as $venue)
                                    @if($venue['id'] == $result['venue_id'])
                                    <option value="{{ $venue['id']}}" selected>{{ $venue['name'] }}</option>
                                    @else
                                    <option value="{{ $venue['id']}}" >{{ $venue['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for='member' class='mt-2'>出演者<p class="space">※スペースを入力しないでください</p></label>
                                <textarea class='form-control' name='member'>{{$result['member']}}</textarea>
                            <label for='comment' class='mt-2'>説明</label>
                                <textarea class='form-control' name='comment'>{{$result['comment']}}</textarea>
                            <label for='comment' class='mt-2'>写真</label>
                                <input type="file" name="image">
                            <div class='row'>
                                <button type='submit' class='edit-btn1'>情報を更新</button>
                            </div> 
    </form>
                        <div class="edit-container">
                            <a href="{{ route('delete.performance',['performance' => $id ])}}"><button class='edit-btn2'>公演を削除</button></a>
                            <a href="{{ route('performance.category',['performance' => $id ])}}"><button class='edit-btn3'>過去公演にする</button></a>
                            <a href="{{ route('performance.image',['performance' => $id ])}}"><button class='edit-btn4'>写真を削除</button></a>
                        </div>
</div>
</div>
@endsection
