@extends('layout')

@section('content')
        
    <h1>Edit Post</h1>

    @if(is_null($post) == 1)

        <p>Post not found to edit</p>

    @else
        <h2>Preview</h2>
        
        <x-post-entry :post="$post" style="background-color: #edcea4"/>

        <br>
        <br>

        <h2>Edit</h2>

        <form method="POST" action="/posts/update/{{$post['id']}}" enctype="multipart/form-data">
            @csrf
            {{-- should be PUT method --}}
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
        
                <button type="submit">Edit Post</button>
            </div>
            
        </form>
    @endif

@endsection