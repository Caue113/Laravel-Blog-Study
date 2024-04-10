@extends("layout")

@section("content")

<form method="POST" action="/posts" enctype="multipart/form-data">
    @csrf

    <div style="display: grid">
        <label for="titleField">Title</label>
        <input type="text" id="titleField" name="title" value={{old("title")}}>
        @error('title')
            <p style="color:red">{{$message}}</p>
        @enderror

        <label for="subtitleField">Subtitle</label>
        <input type="text" id="subtitleField" name="subtitle" value={{old("subtitle")}}>
        @error('subtitle')
            <p style="color:red">{{$message}}</p>
        @enderror

        <label for="tagsField">Tags</label>
        <input type="text" id="tagsField" name="tags" value="{{old("tags")}}">
        @error('tags')
            <p style="color:red">{{$message}}</p>
        @enderror

        <label for="contentField">Content</label>
        <textarea id="contentField" name="content">{{old("content")}}</textarea>
        @error('content')
            <p style="color:red">{{$message}}</p>
        @enderror

        <label for="ownerField">Owner (Removed soon)</label>
        <input id="ownerField" type="text"></textarea>
        
        <label for="bgImageField">Background Image</label>
        <input type="file" id="bgImageField" name="bgImage">

        <button type="submit">Create Post</button>
    </div>
    
</form>

@endsection