@extends('layouts.layout')

@section('content')
<div class="login-box">
  <div class="login">
    <p class="login-text">パスワードリセット</p>
  </div>
  <div>
    @if($errors->any())
      <div class="alert">
    @foreach($errors->all() as $message)
      <p>{{ $message }}</p>
    @endforeach
      </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}" class='form'>
    @csrf
      <div class="login-item">
        <label for="email">メールアドレス</label>
        <input id="email" type="email" name="email" class="login-control" value="{{ old('email') }}" >
      </div>
      <div class="login-btn">
        <button type="submit" class="log-btn">メールを送信</button>
      </div>
    </form>
  </div>
</div>
@endsection