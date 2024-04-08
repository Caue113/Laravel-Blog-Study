@props(['post'])

@php
    $tagNames = $post['tags'];
    $tagNames = explode(",", $tagNames)
@endphp

<article {{$attributes->merge(['style' => "border: black 1px dashed;"])}}>
    <p>post_id: {{$post['id']}}</p>
    <p>post_title: {{$post['title']}}</p>
    <p>post_owner: {{$post['owner']}}</p>

    <p>Posted at: <time>{{$post['created_at']}}</time></p> 
    <p>Last Update: <time>{{$post['updated_at']}}</time></p> 

    <br>

    {{-- Tag List --}}
    <div style="display: flex; flex-flow: row wrap; gap: 0.25rem; margin: 0rem 0.25rem">
    @foreach ($tagNames as $tagName)
        <x-post-tag :tagName="$tagName" />
    @endforeach
    </div>
   

    {{-- <p><i>{{$post['tags']}}</i></p> --}}

    <hr>
    <p>{{$post['content']}}</p>
    
</article>