@extends('layouts.layout')

@section('content')
  <div >
    <div class="row">
      <div >
        <nav >
          <div class="login">ログイン</div>
          <div >
            @if($errors->any())
              <div class="alert">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('login') }}" method="POST" class="form">
              @csrf
              <div >
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div >
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-right">
                <button type="submit" class="login-btn">ログイン</button>
              </div>
            </form>
          </div>
        </nav>
        <div>
          <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
        </div>
      </div>
    </div>
  </div>
@endsection