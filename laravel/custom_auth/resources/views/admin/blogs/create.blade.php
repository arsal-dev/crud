@extends('layouts')

@section('title', 'create blog page')



@section('content')
    <div class="container col-6 mt-5">
        <h3 class="text-center">Create Blog Post</h3>
        <form action="{{ Route('create_blog_post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="excerpt">Excerpt</label>
                <textarea name="excerpt" id="excerpt" class="form-control" cols="30" rows="5">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="body">body</label>
                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ old('body') }}</textarea>
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
            </div>

            <input type="submit" class="btn btn-primary mt-3">
        </form>
    </div>
@endsection
