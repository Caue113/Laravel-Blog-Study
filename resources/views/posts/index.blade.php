@extends("layout")


@section("content")

    <h1>Posts listings</h1>
    {{-- Alternatively, you can use @unless @endunless, which works simlarly to IF-ELSE --}}

    <div class="">
        <form method="GET" action="/posts">
            <label for="searchField">Search</label>
            <input type="text" name="search" id="searchField" placeholder="Search">
            <button type="submit">Search</button>
        </form>
    </div>

    @if (count($posts) != 0)    
        @foreach($posts as $post)
            
            <article style="border: black 1px dashed">
                <p>post_id: {{$post['id']}}</p>
                <a href= "/posts/{{$post['id']}}"> <p>post_title: {{$post['title']}}</p></a>
                <p>post_owner: {{$post['owner']}}</p>

                <x-post-tagList :tags="$post['tags']" />
            </article>
            
        @endforeach
    @else
        <p> No posts exist :(</p>    
    @endif

    {{$posts->links()}}
@endsection