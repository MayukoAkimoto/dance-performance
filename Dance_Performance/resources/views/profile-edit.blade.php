@extends('layouts.layout')
@section('content')
<div class="profile-box2">
    <div class="profile-icon2">
        @if($user['image'] == '' )
            <img src="{{ asset('storage/img/profile_icon.png') }}" id="icon2" >
        @else
            <img src="{{ asset($user['image']) }}" id="icon2" >
        @endif
    </div>
  <div>
    @if($errors->any())
      <div class="alert">
    @foreach($errors->all() as $message)
      <p>{{ $message }}</p>
    @endforeach
      </div>
    @endif
    <form action="{{ route('edit.profile',['user' => Auth::user()->id]) }}" enctype="multipart/form-data" method="post" class="form">
    @csrf
      <div class="profile-item">
        <label for='name'>名前</label>
        <input type='text' class='login-control' name='name' value="{{$user['name']}}"/>
      </div>
      <div class="profile-item">
        <label for='email' class='mt-2'>メールアドレス</label>
        <input type='text' class='login-control' name='email' value="{{$user['email']}}"/>
      </div>
      <div class="profile-item">
        <label for='image' class='mt-2'>写真</label>
        <input type="file" name="image">
      </div>
      <input type="hidden" name='password' value="{{$user['password']}}">
      <div class="login-btn">
        <button type='submit' class='log-btn'>更新</button>
      </div>
    </form>
  </div>
</div>
@endsection