@extends('layout.master')
@section('content')
    <!-- Container for the content with top margin -->
    <div class="container mt-5">
        <!-- Heading for the category edit section -->
        <h2>Edit category</h2>

        <!-- Form for editing a category -->
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF token for form protection -->
            @method('PUT') <!-- HTTP method spoofing for PUT request -->

            <!-- Input field for category name with default value -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                    value="{{ $category->name }}">
                @error('name')
                    {{ $message }} <!-- Display error message if name validation fails -->
                @enderror
            </div>

            <!-- Textarea for category description with default value -->
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a description here" id="description" name="description">{{ $category->description }}</textarea>
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

            <!-- Submit button for saving the edited category -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
