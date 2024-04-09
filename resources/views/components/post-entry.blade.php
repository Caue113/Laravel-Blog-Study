@props(['post'])

<article {{$attributes->merge(['style' => "border: black 1px dashed;"])}}>
    <p>post_id: {{$post['id']}}</p>
    <p>post_title: {{$post['title']}}</p>
    <p>post_owner: {{$post['owner']}}</p>

    <p>Posted at: <time>{{$post['created_at']}}</time></p> 
    <p>Last Update: <time>{{$post['updated_at']}}</time></p> 

    <br>

    {{-- Tag List --}}
    <x-post-tagList :tags="$post['tags']"/>

    {{-- <p><i>{{$post['tags']}}</i></p> --}}

    <hr>
    <p>{{$post['content']}}</p>
    
</article>