@extends('layout')

@section('title', 'edit blog post')

@section('content')

    @if (Session::has('success'))
        {{ Session::get('success') }}
    @endif

    <div class="container mt-5">
        <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" placeholder="title"
                    class="form-control">
                @error('title')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                <input type="text" name="excerpt" value="{{ old('excerpt', $post->excerpt) }}" id="excerpt"
                    placeholder="excerpt" class="form-control">
                @error('excerpt')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" class="form-control" rows="10">{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" value="update post" class="btn btn-primary mt-2">
        </form>
    </div>
@endsection
