@extends('layouts.users')
@section('content')
    <div class="register-container">
        <h1>アカウント作成</h1>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <input type="text" id="name" name="name" placeholder="ニックネーム" required>
            <input type="email" id="email" name="email" placeholder="メールアドレス" required>
            <input type="password" id="password" name="password" placeholder="パスワード" required>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="確認用パスワード" required>
            <button type="submit">登録</button>
        </form>
        <p>すでにアカウントをお持ちの方は <a href="#">こちら</a></p>
    </div>
@endsection
