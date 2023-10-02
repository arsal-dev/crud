@extends('layout')

@section('title', 'all blog posts')

@section('content')
    @if (Session::has('success'))
        {{ Session::get('success') }}
    @endif

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Excerpt</th>
                    <th scope="col">Body</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->excerpt }}</td>
                        <td>{{ $post->body }}</td>
                        <td><a href="{{ Route('post.edit', $post->id) }}" class="btn btn-primary">EDIT</a>
                            <form action="{{ Route('post.destroy', $post->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="DELETE">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
