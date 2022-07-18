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
    <form method="POST" action="{{ route('password.update') }}" class='form'>
    @csrf
        <input type="hidden" name="token" value="{{ $token }}">
      <div class="login-item">
        <label for="email" >メールアドレス</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" >
      </div>
      <div class="login-item">
        <label for="password">パスワード</label>
        <input id="password" type="password" class="form-control" name="password" >
      </div>
      <div class="login-item">
        <label for="password">パスワード（確認）</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
      </div>
      <div class="login-btn">
        <button type="submit" class="log-btn">登録</button>
      </div>
    </form>
  </div>
</div>
@endsection