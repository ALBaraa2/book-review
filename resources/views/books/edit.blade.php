@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Book</h1>
                <form action="{{ route('books.update', $book) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="input mb-4" id="title" name="title" value="{{ $book->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="input mb-4" id="description" name="description">{{ $book->description }}</textarea>
                    </div>
                    <div class="flex space-x-2">
                        <button type="submit" class="btn">Submit</button>
                        <a href="{{ route('books.show', $book) }}" class="btn-cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
