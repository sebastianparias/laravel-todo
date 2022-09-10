@extends('app')
@section('content')
    <div class="container w-25 p-4 my-4">
        <div class="row mx-auto">

            <form action="{{ '/categories/' . $category->id }}" method="POST" class="mt-3 border p-4">
                @method('PUT')

                @csrf

                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('name')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="name" class="form-label">Category name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $category->name }}">

                    <label for="color" class="form-label">Category color</label>
                    <input type="color" class="form-control" name="color" id="color" value="{{ $category->color }}">

                </div>
                <button type="submit" class="btn btn-primary">Update category</button>
            </form>

        </div>
    </div>
@endsection
