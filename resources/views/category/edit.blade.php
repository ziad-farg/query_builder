@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2>Edit new category</h2>
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                    value="{{ $category->name }}">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a descritpion here" id="description" name="description">{{ $category->description }}</textarea>
                <label for="description">Description</label>
                @error('description')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Iamge</label>
                <input class="form-control" type="file" id="image" name="image">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
