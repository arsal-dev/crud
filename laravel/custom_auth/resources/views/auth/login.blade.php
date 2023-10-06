@extends('layouts')

@section('title', 'login page')



@section('content')
    <div class="container mt-5 col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Login Form</h5>
                @if (Session::has('login'))
                    <p class="text-danger">{{ Session::get('login') }}</p>
                @endif
                <form action="{{ Route('login_post') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="email" class="form-control"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="password" class="form-control">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-check mt-2">
                        <label for="check" class="form-check-label">remember me</label>
                        <input type="checkbox" id="check" name="check" class="form-check-input">
                    </div>

                    <input type="submit" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>
@endsection
