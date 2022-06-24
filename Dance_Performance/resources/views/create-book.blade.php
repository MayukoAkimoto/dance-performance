@extends('layouts.layout')
<!-- 予約する チェックボックスを１つしか選べないようにしたい-->
@section('content')
<p>{{ $performance['title']}}</p>
<p>{{ $performance['date1']}}</p>
<p>{{ $performance['date2']}}</p>
<p>{{ $performance['name']}}</p>
<p>{{ $performance['price']}}</p>
<p>{{ $performance['member']}}</p>
<p>{{ $performance['comment']}}</p>
<form action="{{ route('book.create',['id' => $id ])}}" method="post">
                            @csrf
                            <label for='ticket'>チケット枚数</label>
                                <input type='text' class='form-control' name='ticket'/>
                            <label for='ticket'>日時</label>
                                <input type="checkbox" name='date' value="{{ $performance['date1']}}">{{ $performance['date1']}}
                                <input type="checkbox" name='date' value="{{ $performance['date2']}}">{{ $performance['date2']}}
                            <input type="hidden" name='pfm_id' value="{{ $performance['id'] }}">
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>

@endsection