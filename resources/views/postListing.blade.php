@extends("layout")


@section("content")

    <h1>Posts listings</h1>
    {{-- Alternatively, you can use @unless @endunless, which works simlarly to IF-ELSE --}}

    @if (count($posts) != 0)    
        @foreach($posts as $post)
            
            <article style="border: black 1px dashed">
                <p>post_id: {{$post['id']}}</p>
                <a href= "/posts/{{$post['id']}}"> <p>post_title: {{$post['title']}}</p></a>
                <p>post_owner: {{$post['owner']}}</p>
            </article>
            
        @endforeach
    @else
        <p> No posts exist :(</p>    
    @endif
    
@endsection