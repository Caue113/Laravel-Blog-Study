@props(["tagName"])

<div style="background-color: #0f0f0f; color: #ffffff; text-align: center; padding: 0.5rem 0.75rem; width: min-content; border-radius: 1rem">
    <a href="/posts?tag={{$tagName}}">
        <p style="margin: 0px">{{$tagName}}</p> 
    </a>
</div>