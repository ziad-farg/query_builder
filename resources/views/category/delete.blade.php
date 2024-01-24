@extends('layout.master')
@section('style')
    <!-- CSS style to center the content vertically -->
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <!-- Container for the content -->
    <div class="container">
        <div class="row justify-content-center">
            <!-- Card to display category details -->
            <div class="card" style="width: 18rem;">
                <!-- Image at the top of the card -->
                <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top" alt="...">

                <!-- Card body with category details -->
                <div class="card-body ">
                    <!-- Category name as card title -->
                    <h5 class="card-title">{{ $category->name }}</h5>

                    <!-- Category description as card text -->
                    <p class="card-text">{{ $category->description }}</p>

                    <!-- Form for deleting the category -->
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                        @csrf <!-- CSRF token for form protection -->
                        @method('DELETE') <!-- HTTP method spoofing for DELETE request -->

                        <!-- Submit button to delete the category -->
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>

                    <!-- Link to cancel and navigate back to the category index -->
                    <a href="{{ route('category.index') }}" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
