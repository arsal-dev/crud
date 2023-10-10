@extends('layouts')

@section('title', 'edit blog page')



@section('content')
    <div class="container col-6 mt-5">
        <h3 class="text-center">Edit Blog Post</h3>
        <form action="{{ Route('update_blog_posts', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="form-control"
                    id="title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="excerpt">Excerpt</label>
                <textarea name="excerpt" id="excerpt" class="form-control" cols="30" rows="5">{{ old('excerpt', $blog->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="body">body</label>
                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ old('body', $blog->body) }}</textarea>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="thumbnail">Upload</label>
                <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                @error('thumbnail')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <img src="{{ asset('storage/uploads/' . $blog->thumbnail) }}" class="img-thumbnail">
            </div>

            <input type="submit" class="btn btn-primary mt-3">
        </form>
    </div>
@endsection
