@extends('app')
@section('content')
    <div class="container w-25 p-4 my-4">
        <div class="row mx-auto">
            <form action="{{ '/categories' }}" method="POST" class="mt-3 border p-4">
                @csrf

                @if (session('success'))
                    <h6 class="alert alert-success">{{ session('success') }}</h6>
                @endif

                @error('name')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror

                <div class="mb-3">
                    <label for="name" class="form-label">Category name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Category color</label>
                    <input type="color" class="form-control" name="color" id="color">
                </div>

                <button type="submit" class="btn btn-primary">Create new category</button>
            </form>
        </div>

        <div>
            @foreach ($categories as $category)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a class="d-flex align-items-center gap-2" href="{{ 'categories/' . $category->id . '/edit' }}">
                            <span class="color-container"
                                style="background-color: {{ $category->color }}">{{ $category->color }}</span>
                            {{ $category->name }}
                        </a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modal-{{ $category->id }}">Delete</button>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal-{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                This will delete all the tasks associated with this category, do you want to proceed?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{'/categories/' . $category->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
