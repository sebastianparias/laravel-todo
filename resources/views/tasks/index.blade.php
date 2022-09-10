@extends('app')
@section('content')
    <div class="container w-25 p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ '/tasks' }}" method="POST" class="mt-3 border p-4">
                @csrf

                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('title')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                @error('category_id')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="title" class="form-label">Task title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <label for="category_id" class="form-label">Task category</label>
                <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary mt-3">Create new task</button>
            </form>

            <div>

                @foreach ($todos as $todo)
                    <div class="row py-1">
                        <div class="col-md-9 d-flex align-items-center">
                            <a href="{{ '/tasks/' . $todo->id . '/edit' }}">
                                {{ $todo->title }}
                            </a>
                        </div>

                        <div class="col-md-3 d-flex justify-content-end">
                            <form action="{{ '/tasks/' . $todo->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Delete</button>
                                </a>
                            </form>
                        </div>




                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
