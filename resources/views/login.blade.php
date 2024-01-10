@extends('app.layout')


@section('content')


    <form action="{{ route('login') }}" method="POST">
        @csrf
        <h2>Giriş Yap</h2>

        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" required>
            <br>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" id="password" name="password" required>
            <br>
        </div>
        <button class="btn btn-info btn-lg" type="submit">Login</button>
        <p>Henüz bir hesabın yok mu? <a href="{{ route('register') }}">Kayıt Ol</a></p>
    </form>


@endsection
