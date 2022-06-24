@extends('layouts.layout')
<!-- 管理者の新規公演追加 -->
@section('content')
<form action="{{ route('performance.create')}}" method="post">
                            @csrf
                            <label for='title'>タイトル</label>
                                <input type='text' class='form-control' name='title'/>
                            <label for='date1' class='mt-2'>日付</label>
                                <input type='datetime-local' class='form-control' name='date1' id='date1'/>
                            <label for='date2' class='mt-2'>日付</label>
                                <input type='datetime-local' class='form-control' name='date2' id='date2'/>
                            <label for='price'>金額</label>
                                <input type='text' class='form-control' name='price'/>
                            <label for='venue' class='mt-2'>会場</label>
                            <a href="{{route('venue.create')}}">新規追加</a>
                            <select name='venue_id' class='form-control'>
                                <option value='' hidden>会場名</option>
                                @foreach($venues as $venue)
                                <option value="{{ $venue['id']}}">{{ $venue['name'] }}</option>
                                @endforeach
                            </select>
                            <label for='member' class='mt-2'>出演者</label>
                                <textarea class='form-control' name='member'></textarea>
                            <label for='comment' class='mt-2'>説明</label>
                                <textarea class='form-control' name='comment'></textarea>
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>

@endsection
