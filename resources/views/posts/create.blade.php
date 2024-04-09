@extends("layout")

@section("content")

<form method="POST" action="/posts">
    @csrf

    <label for="titleField">Title</label>
    <input type="text" id="titleField" name="title">
    @error('title')
        <p style="color:red">{{$message}}</p>
    @enderror

    <label for="subtitleField">Subtitle</label>
    <input type="text" id="subtitleField" name="subtitle">

    <label for="tagsField">Tags</label>
    <input type="text" id="tagsField" name="tags">
    @error('tags')
        <p style="color:red">{{$message}}</p>
    @enderror

    <label for="contentField">Content</label>
    <textarea id="contentField" name="content"></textarea>
    @error('content')
        <p style="color:red">{{$message}}</p>
    @enderror

    <label for="ownerField">Owner (Removed soon)</label>
    <input id="ownerField" type="text"></textarea>

    <button type="submit">Create Post</button>
</form>

@endsection