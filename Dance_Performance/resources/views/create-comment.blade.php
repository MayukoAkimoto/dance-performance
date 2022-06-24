@extends('layouts.layout')
<!--  感想投稿 -->
@section('content')
<form action="{{ route('comment.create',['id' => $id ])}}" method="post">
                            @csrf
                            <label for='comment' class='mt-2'>感想</label>
                                <textarea class='form-control' name='comment'></textarea>
                            <input type="hidden" name='pfm_id' value="{{ $performance['id'] }}">
                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>
                            </div> 
                        </form>

@endsection