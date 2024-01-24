@extends('layout.master')
@section('content')
    <!-- Table to display categories -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through categories and display each row in the table -->
            @foreach ($categories as $category)
                <tr>
                    <!-- Display category details in each column -->
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td><img width="150" src="{{ asset('storage/' . $category->image) }}" alt=""></td>

                    <!-- Buttons for editing, showing, and deleting a category -->
                    <td>
                        <a class="btn btn-primary" href="{{ route('category.edit', $category->id) }}">Edit</a>
                        <a class="btn btn-info" href="{{ route('category.show', $category->id) }}">Show</a>
                        <a class="btn btn-danger" href="{{ route('category.show', $category->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links for the categories -->
    {{ $categories->links() }}

    <!-- Button to navigate to the 'category.create' route for adding a new category -->
    <a class="btn btn-primary" href="{{ route('category.create') }}">Add new category</a>
@endsection
