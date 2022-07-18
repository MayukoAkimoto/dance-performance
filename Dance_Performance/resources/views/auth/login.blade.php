@extends('layouts.layout')

@section('content')
<div class="login-box">
  <div class="login">
    <p class="login-text">ログイン</p>
  </div>
  <div>
    @if($errors->any())
      <div class="alert">
    @foreach($errors->all() as $message)
      <p>{{ $message }}</p>
    @endforeach
      </div>
    @endif
    <form action="{{ route('login') }}" method="POST" class="form">
    @csrf
      <div class="login-item">
        <label for="email">メールアドレス</label>
        <input type="text" class="login-control" id="email" name="email" value="{{ old('email') }}" />
      </div>
      <div class="login-item">
        <label for="password">パスワード</label>
        <input type="password" class="login-control" id="password" name="password" />
      </div>
      <div class="login-btn">
        <button type="submit" class="log-btn">ログイン</button>
        <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
      </div>
    </form>
  </div>
</div>
@endsection