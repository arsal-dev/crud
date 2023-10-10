@extends('layouts')

@section('title', 'dashboard page')



@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blogs</h5>
                        <p class="card-text">All Blog Related Routes</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ Route('create_blog') }}">Create Blog</a></li>
                            <li class="list-group-item"><a href="{{ Route('all_blog_posts') }}">All Blog Posts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">All Categories Related Routes</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ Route('all_categories') }}">All Category</a></li>
                            <li class="list-group-item"><a href="{{ Route('create_category') }}">Create Category</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
