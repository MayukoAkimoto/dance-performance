@extends('layouts.layout')

@section('content')
<div class="login-box">
  <div class="login">
    <p class="login-text">会員登録</p>
  </div>
  <div>
    @if($errors->any())
      <div class="alert">
    @foreach($errors->all() as $message)
      <p>{{ $message }}</p>
    @endforeach
      </div>
    @endif
    <form action="{{ route('register') }}" method="POST" class="form">
    @csrf
      <div class="login-item">
        <label for="email">メールアドレス</label>
        <input type="text" class="login-control" id="email" name="email" value="{{ old('email') }}" />
      </div>
      <div class="login-item">
        <label for="name">ユーザー名</label>
        <input type="text" class="login-control" id="name" name="name" value="{{ old('name') }}" />
      </div>
      <div class="login-item">
        <label for="password">パスワード</label>
        <input type="password" class="login-control" id="password" name="password">
      </div>
      <div class="login-item">
        <label for="password-confirm">パスワード（確認）</label>
        <input type="password" class="login-control" id="password-confirm" name="password_confirmation">
      </div>
      <div class="login-btn">
        <button type="submit" class="log-btn">送信</button>
      </div>
    </form>
  </div>
</div>
@endsection