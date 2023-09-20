@extends('application')

@section('title', 'my title')


@section('content')
    <h1>this is a home page!</h1>

    @foreach ($data as $key => $value)
        <h1>{{ $value }}</h1>
    @endforeach
@endsection
