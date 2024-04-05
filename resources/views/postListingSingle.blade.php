@extends('layout')

@section('content')
        
    <h1>Post</h1>

    @if(is_null($post) == 1)

        <p>Post not found :(</p>

    @else

        <article style="border: black 1px dashed">
            <p>post_id: {{$post['id']}}</p>
            <p>post_title: {{$post['title']}}</p>
            <p>post_owner: {{$post['owner']}}</p>

            <p>Posted at: <time>{{$post['created_at']}}</time></p> 
            <p>Last Update: <time>{{$post['updated_at']}}</time></p> 

            <hr>
            <p>{{$post['content']}}</p>
        </article>
    @endif

@endsection