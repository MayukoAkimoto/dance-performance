@extends('layouts.layout')
<!-- 管理者の新規公演追加 -->
@section('content')
<div>
<div class='panel-body'>
                            @if($errors->any())
                            <div class='alert'>
                                    @foreach($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                    @endforeach
                            </div>
                            @endif
                        </div>

<form action="{{ route('performance.create')}}" enctype="multipart/form-data" method="post" class="form" >
                            @csrf
                            <label for='title' class='mt-2'>タイトル</label>
                                <input type='text' class='form-control' name='title' value="{{ old('title') }}"/>
                            <label for='date1' class='mt-2'>日付</label>
                                <input type='datetime-local' class='form-control' name='date1' id='date1' value="{{ old('date1') }}"/>
                            <label for='date2' class='mt-2'>日付</label>
                                <input type='datetime-local' class='form-control' name='date2' id='date2' value="{{ old('date2') }}"/>
                            <label for='price' class='mt-2'>金額</label>
                                <input type='text' class='form-control' name='price' valeu="{{ old('price') }}"/>
                            <div class="venue">
                                <label for='venue' class='mt-2'>会場</label>
                                <a href="{{route('venue.create')}}">会場の新規追加</a>
                            </div>
                            <select name='venue_id' class='form-control'>
                                <option value='' hidden>会場名</option>
                                @foreach($venues as $venue)
                                <option value="{{ $venue['id']}}">{{ $venue['name'] }}</option>
                                @endforeach
                            </select>
                            <label for='member' class='mt-2'>出演者<p class="space">※スペースを入力しないでください</p></label>
                                <textarea class='form-control' name='member'>{{ old('member') }}</textarea>
                            <label for='comment' class='mt-2'>説明</label>
                                <textarea class='form-control' name='comment'>{{ old('comment') }}</textarea>
                            <label for='comment' class='mt-2'>写真</label>
                                <input type="file" name="image">
                            <div class='row'>
                                <button type='submit' class='form-btn'>登録</button>
                            </div> 
                        </form>
</div>
<div class="back-box">
<a href="{{url('/')}}" class="back">＜　一覧 へ戻る</a>
</div>
@endsection