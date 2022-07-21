@extends('layouts.layout')

@section('content')
<div class="profile-box">
    <div class="profile-icon">
        @if($user['image'] == '' )
            <img src="{{ asset('storage/img/profile_icon.png') }}" id="icon" >
        @else
            <img src="{{ asset($user['image']) }}" id="icon" >
        @endif
    </div>
    <div class="profile-text">
        <p>名前：{{ $user['name'] }}</p>
        <p>メールアドレス：{{ $user['email'] }}</p>
    </div>
    <div class="profile-edit">
        <a href="{{ route('edit.profile',['user' => Auth::user()->id]) }}" >プロフィールを変更する</a>
    </div>
</div>
<div class="ditail-box">
    <div class="ditail-1">
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>タイトル</th>
                    <th scope='col'>日時</th>
                    <th scope='col'>チケット枚数</th>
                    <th scope='col'>金額</th>
                    <th scope='col'></th>

                </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope='col'>{{ $book['title'] }}</a></th>
                    <th scope='col'>{{ $book['date'] }}</th>
                    <th scope='col'>{{ $book['ticket'] }}</th>
                    <th scope='col'>{{ $book['ticket'] * $book['price'] }}円</th>
                    <th><a href="{{ route('user.book.edit',['book' => $book['id']]) }}">変更</a></th>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection