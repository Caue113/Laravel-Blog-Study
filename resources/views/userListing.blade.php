<h1>User listings</h1>

<h2>{{$heading}}</h2>

{{-- Alternatively, you can use @unless @endunless, which works simlarly to IF-ELSE --}}

@if (count($users) != 0)    
    @foreach($users as $user)
        <p>id: {{$user['id']}}</p>
        <p>Name: {{$user['name']}}</p>
        <p>Bio: {{$user['bio']}}</p>
    @endforeach
@else
    <p> No users :[</p>    
@endif


