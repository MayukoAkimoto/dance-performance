@extends('layouts.layout')
<!-- 会場の新規追加 -->
@section('content')
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

<form action="{{ route('venue.create')}}" method="post" class="form">
                            @csrf
                            <label for='name' class='mt-2' >会場名</label>
                                <input type='text' class='form-control' name='name' valeu="{{ old('name') }}"/>
                                <div class='row'>
                                <button type='submit' class='form-btn'>登録</button>
                            </div>
                        </form>
</div>
<div class="back-box">
<a href="{{url('/create_performance')}}" class="back">＜　新規作成へ戻る</a>
</div>
@endsection