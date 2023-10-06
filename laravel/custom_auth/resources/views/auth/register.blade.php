@extends('layouts')

@section('title', 'register page')



@section('content')
    <div class="container mt-5 col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Register Form</h5>
                @if (Session::has('login'))
                    <p class="text-danger">{{ Session::get('login') }}</p>
                @endif
                <form action="{{ Route('register_post') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" name="name" id="name" placeholder="name" class="form-control"
                            value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
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
                    <div class="form-group mt-2">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Confirm Password" class="form-control">
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="submit" value="Regiter" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>
@endsection
