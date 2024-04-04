<h1>Post</h1>

{{-- Alternatively, you can use @unless @endunless, which works simlarly to IF-ELSE --}}
<article style="border: black 1px dashed">
    <p>post_id: {{$post['id']}}</p>
    <p>post_title: {{$post['title']}}</p>
    <p>post_owner: {{$post['owner']}}</p>
</article>

{{-- @if ($status != "404")    

@else
    <p> Posts not found :(</p>    
@endif --}}