@props(['tags'])

@php
    $tagNames = $tags;
    $tagNames = explode(",", $tagNames)
@endphp

<div style="display: flex; flex-flow: row wrap; gap: 0.25rem; margin: 0rem 0.25rem">
@foreach ($tagNames as $tagName)
    <x-post-tag :tagName="$tagName" />
@endforeach
</div>