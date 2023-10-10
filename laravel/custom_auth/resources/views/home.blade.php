@extends('layouts')

@section('title', 'home page')



@section('content')
    <div class="container col-6 mt-5">

        @if (Session::has('success'))
            <p class="text-success">{{ Session::get('success') }}</p>
        @endif

        @foreach ($blogs as $blog)
            <div class="card mt-5">
                <a href="{{ Route('blog', $blog->id) }}">
                    <img src="{{ asset('storage/uploads/' . $blog->thumbnail) }}" class="card-img-top"
                        alt="{{ $blog->title }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-decoration-none">{{ $blog->title }}</h5>
                    <p class="card-text text-decoration-none">{{ $blog->excerpt }}</p>
                    <a href="{{ Route('blog', $blog->id) }}" class="btn btn-primary">View Blog</a>
                </div>
                <div class="card-footer text-body-secondary text-decoration-none">
                    {{ $blog->created_at }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
