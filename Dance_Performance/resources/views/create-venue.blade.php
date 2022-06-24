@extends('layouts.layout')
<!-- 会場の新規追加 -->
@section('content')
<form action="{{ route('venue.create')}}" method="post">
                            @csrf
                            <label for='name'>会場名</label>
                                <input type='text' class='form-control' name='name'/>
                                <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div>
                        </form>

@endsection