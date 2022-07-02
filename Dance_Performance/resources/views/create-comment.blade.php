@extends('layouts.layout')
<!--  感想投稿 -->
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

<form action="{{ route('comment.create',['performance' => $id ])}}" method="post" class="form">
                            @csrf
                            <label for='comment' class='mt-2'>感想</label>
                                <textarea class='form-control' name='comment'>{{ old('comment') }}</textarea>
                            <input type="hidden" name='pfm_id' value="{{ $performance['id'] }}">
                            <div class='row justify-content-center'>
                            <button type='submit' class='btn btn-primary w-25 mt-3'>投稿</button>
                            </div> 
                        </form>
</div>
@endsection