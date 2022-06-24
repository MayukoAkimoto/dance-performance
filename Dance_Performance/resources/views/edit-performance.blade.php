@extends('layouts.layout')
<!-- 管理者の公演更新画面 -->
@section('content')
<form action="{{ route('performance.edit',['id' => $id ])}}" method="post">
                            @csrf
                            <label for='title'>タイトル</label>
                                <input type='text' class='form-control' name='title' value="{{$result['title']}}"/>
                            <label for='date1' class='mt-2'>日付</label>
                                <input type='text' class='form-control' name='date1' id='date1' value="{{$result['date1']}}"/>
                            <label for='date2' class='mt-2'>日付</label>
                                <input type='text' class='form-control' name='date2' id='date2' value="{{$result['date2']}}"/>
                            <label for='price'>金額</label>
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
                            <label for='member' class='mt-2'>出演者</label>
                                <textarea class='form-control' name='member'>{{$result['member']}}</textarea>
                            <label for='comment' class='mt-2'>説明</label>
                                <textarea class='form-control' name='comment'>{{$result['comment']}}</textarea>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>情報を更新</button>
                            </div> 
                        </form>
                        <a href="{{ route('delete.performance',['id' => $id ])}}">削除</a>
                        <a href="{{ route('performance.category',['id' => $id ])}}">過去公演に変更</a>


@endsection
