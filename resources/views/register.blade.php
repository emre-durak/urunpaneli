@extends('app.layout')


@section('content')

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <h2>Kayıt Ol</h2>

        <br>

        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" id="name" name="name" required>
        </div>
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
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
            <br>
        </div>

        <button class="btn btn-success btn-lg" type="submit">Kayıt Ol</button>
    </form>

@endsection
