@extends('app')
@section('content')
    <div class="container">
        <form action="{{ '/tasks/'. $todo->id}}" method="PUT" class="mt-3 border p-4">
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Task title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="title" value="{{ $todo->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Update task</button>
        </form>

    </div>
    </div>
@endsection
