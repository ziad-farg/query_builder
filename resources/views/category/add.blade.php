@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <h2>Add new category</h2>
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a descritpion here" id="description" name="description"></textarea>
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
