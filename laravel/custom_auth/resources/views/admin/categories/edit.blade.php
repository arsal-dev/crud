@extends('layouts')

@section('title', 'update category page')



@section('content')
    <div class="container col-6 mt-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('edit_category_post', $id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
                            placeholder="Enter Category Name" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="submit" value="update category" class="btn btn-primary mt-3">
                </form>
            </div>
        </div>
    </div>
@endsection
