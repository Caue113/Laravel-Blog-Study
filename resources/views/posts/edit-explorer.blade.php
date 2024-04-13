@extends("layout")

@section('content')
    <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; grid-column-gap: 0.5rem; width: 90%; padding: 0.5rem;">
        @foreach($posts as $post)
            @php
                /* Show adequate image */
                $imgPath = is_null($post['bgImagePath']) ? asset("/images/no-image.jpg") : asset("storage/" . $post['bgImagePath']);
            @endphp
            
            <article style="border: black 1px dashed">
                <img src="{{$imgPath}}" width="100px" height="auto">

                <p>post_id: {{$post['id']}}</p>
                <a href= "/posts/{{$post['id']}}"> <p>post_title: {{$post['title']}}</p></a>
                <p>post_owner: {{$post->user['name']}}</p>

                <x-post-tagList :tags="$post['tags']" />

                <div>
                    <a href="/posts/edit/{{$post['id']}}">Edit</a>
                    
                    <form method="POST" action="/posts/delete/{{$post['id']}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 p-2 bg-white rounded-lg mb-6">Delete</button>
                    </form>
                </div>
            </article>
            
        @endforeach
    </div>
@endsection