@extends('layout.master')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Handel</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td><img width="150" src="{{ asset('storage/' . $category->image) }}" alt=""></td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('category.edit', $category->id) }}">Edit</a>
                        <a class="btn btn-info" href="{{ route('category.show', $category->id) }}">Show</a>
                        <a class="btn btn-danger" href="{{ route('category.show', $category->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
    <a class="btn btn-primary" href="{{ route('category.create') }}">Add new category</a>
@endsection
