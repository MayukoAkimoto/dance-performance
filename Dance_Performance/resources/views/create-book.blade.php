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
<div>
                        <div>
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
<form action="{{ route('book.create',['performance' => $id ])}}" method="post" class="form">
                            @csrf
                            <label for='ticket'>チケット枚数</label>
                                <input type='text' class='form-ticket' name='ticket' valeu="{{ old('ticket') }}"/>
                            <label for='ticket'>日時</label>
                            <div>
                                    <input type="checkbox" name='date' value="{{ $performance['date1']}}">{{ $performance['date1']}}
                                    <input type="checkbox" name='date' value="{{ $performance['date2']}}">{{ $performance['date2']}}
                            </div>
                            <input type="hidden" name='pfm_id' value="{{ $id }}">
                            <div class='row'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>予約</button>
                            </div> 
                        </form>
</div>
@endsection