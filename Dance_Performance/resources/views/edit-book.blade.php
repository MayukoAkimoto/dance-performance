@extends('layouts.layout')
<!-- 予約編集画面 -->
<h1>予約編集画面</h1>
@section('content')
<a href="{{ url('/') }}">管理者トップ</a>
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

<form action="{{ route('book.edit',['book' => $id ])}}" method="post">
                            @csrf
                            <label for='title'>名前</label>
                                {{$result['name']}}
                            <label for='ticket' class='mt-2'>チケット枚数</label>
                                <input type='text' class='form-control' name='ticket' id='ticket' value="{{$result['ticket']}}"/>
                            <label for='ticket'>日時</label>
                            @foreach($performance as $value)
                                <input type="checkbox" name='date' value="{{ $value['date1']}}">{{ $value['date1']}}
                                <input type="checkbox" name='date' value="{{ $value['date2']}}">{{ $value['date2']}}
                            @endforeach
                            <input type='hidden' class='form-control' name='pfm_id' id='pfm_id' value="{{$result['pfm_id']}}"/>
                            <input type='hidden' class='form-control' name='user_id' id='user_id' value="{{$result['user_id']}}"/>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>情報を更新</button>
                            </div> 
                        </form>
                        <a href="">削除</a>
                        <a href="{{ route('delete.book',['book' => $id ])}}">削除</a>


</div>
@endsection
