@extends("layout")

@section('content')

    <section >
        <form method="POST" action="/users" style="display: grid">
            @csrf
            <label for='name'>Name</label>
            <input type="text" id="name" name="name" required  value="{{old('name')}}">
            @error('name')
                <p style="color:red">{{$message}}</p>
            @enderror

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

            <label for='password_confirmation'>Repeat Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            @error('password_confirmation')
                <p style="color:red">{{$message}}</p>
            @enderror

            <button type="submit">Register</button>

            <div>
                <p>Already has an account?</p>
                <a href="/login"><p>Login</p></a>
            </div>
        </form>
    </section>

@endsection