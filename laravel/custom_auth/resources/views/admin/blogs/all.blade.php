@extends('layouts')

@section('title', 'all blogs page')



@section('content')
    <div class="container col-6 mt-5">
        <div class="card">
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ Session::get('success') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Title</th>
                            <th scope="col">Excerpt</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <th scope="row">{{ $blog->id }}</th>
                                <td><img class="img-thumbnail" width="200px"
                                        src="{{ asset('storage/uploads/' . $blog->thumbnail) }}" alt="{{ $blog->title }}">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->excerpt }}</td>
                                <td>
                                    <a href="{{ Route('edit_blog_posts', $blog->id) }}" class="btn btn-warning">UPDATE</a>
                                    <form action="{{ Route('delete_blog_post', $blog->id) }}" class="d-inline"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="DELETE" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
