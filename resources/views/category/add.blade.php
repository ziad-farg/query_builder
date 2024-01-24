@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <!-- Heading for the add new category section -->
        <h2>Add new category</h2>

        <!-- Form for adding a new category -->
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF token for form protection -->

            <!-- Input field for category name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                @error('name')
                    {{ $message }} <!-- Display error message if name validation fails -->
                @enderror
            </div>

            <!-- Textarea for category description -->
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a description here" id="description" name="description"></textarea>
                <label for="description">Description</label>
                @error('description')
                    {{ $message }} <!-- Display error message if description validation fails -->
                @enderror
            </div>

            <!-- Input field for category image -->
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
                @error('image')
                    {{ $message }} <!-- Display error message if image validation fails -->
                @enderror
            </div>

            <!-- Submit button for saving the new category -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
