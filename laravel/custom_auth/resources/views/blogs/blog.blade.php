@extends('layouts')

@section('title', 'home page')



@section('content')
    <div class="container col-6 mt-5">
        <div class="card mt-5">
            @php
                $img = $blog[0]['thumbnail'];
                $img_link = "storage/uploads/$img";
            @endphp
            <img src="{{ asset($img_link) }}" class="card-img-top" alt="{{ $blog[0]['title'] }}">
            <div class="card-body">
                <h5 class="card-title text-decoration-none">{{ $blog[0]['title'] }}</h5>
                <p class="card-text text-decoration-none">{{ $blog[0]['body'] }}</p>
            </div>
            <div class="card-footer text-body-secondary text-decoration-none">
                {{ $blog[0]['created_at'] }}
            </div>
        </div>
    @endsection
