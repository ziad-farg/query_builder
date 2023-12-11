@extends('layout.master')
@section('style')
    <style>
        /* Center the content vertically */
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top" alt="...">
                <div class="card-body ">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <p class="card-text">{{ $category->description }}</p>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                    <a href="{{ route('category.index') }}" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
