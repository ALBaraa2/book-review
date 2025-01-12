@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $book->title }}</h1>
                <p>{{ $book->author }}</p>
                <p>{{ $book->description }}</p>
                <p>{{ $book->created_at }}</p>
                <p>{{ $book->updated_at }}</p>
                <a href="{{ route('books.edit', $book) }}" class="btn">Edit</a>
            </div>
        </div>
    </div>
@endsection
