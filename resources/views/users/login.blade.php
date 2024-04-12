@extends("layout")

@section('content')

    <h2>Login</h2>

    <section>
        <form method="POST" action="/users/authenticate" style="display: grid">
            @csrf

            <label for='email'>Email</label>
            <input type="email" id="email" name="email" required value="{{old('email')}}">
            @error('email')
                <p style="color:red">{{$message}}</p>
            @enderror

            <label for='password'>Password</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <p style="color:red">{{$message}}</p>
            @enderror

            <button type="submit">Login</button>

            <div>
                <p>Don't have an account?</p>
                <a href="/register"><p>Register</p></a>
            </div>
        </form>
    </section>

@endsection