@extends('layout')

@section('content')
        
    <h1>Post</h1>

    @if(is_null($post) == 1)

        <p>Post not found :(</p>

    @else
        <x-post-entry :post="$post" style="background-color: #edcea4"/>

        <div>
            <a href="/posts/edit/{{$post['id']}}"><p>Edit post</p></a>
        </div>
    @endif

@endsection