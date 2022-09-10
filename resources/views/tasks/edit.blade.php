@extends('app')
@section('content')
    <div class="container w-25 p-4 my-4">
        <div class="row mx-auto">

            <form action="{{ '/tasks/' . $todo->id }}" method="POST" class="mt-3 border p-4">
                @method('PUT')

                @csrf

                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('title')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="title" class="form-label">Task title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $todo->title }}">
                </div>
                <div>
                    <select name="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
      

                </div>
                <button type="submit" class="btn btn-primary mt-3">Update task</button>
            </form>


        </div>
    </div>
@endsection
