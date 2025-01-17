@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control input mb-4" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control input mb-4" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control input mb-4" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn">Submit</button>
        <a href="{{ route('books.index') }}" class="btn-cancel">Cancel</a>
    </form>
</div>
@endsection
