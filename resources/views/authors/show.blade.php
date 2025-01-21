@extends('layouts.app')

@section('content')

    <h1 class="sticky top-0 mb-2 text-2xl font-bold text-center bg-gray-100 p-4 shadow-md">{{ $author->name }}</h1>

    <div class="book-info p-6 bg-white rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Contact</h2>
        <div class="text-gray-600 leading-relaxed mb-4">
            <span class="font-medium">Email:</span> {{ $author->user->email }}
        </div>
        <div class="text-gray-600 leading-relaxed mb-4">
            <span class="font-medium">Phone:</span> {{ $author->phone }}
        </div>
        <div class="text-gray-600 leading-relaxed mb-4">
            <span class="font-medium">Address:</span> {{ $author->address }}
        </div>
    </div>
    <h2 class="text-xl font-semibold mt-6 mb-4">Books</h2>
    @foreach ($author->books as $book)
        <div class="book-info p-6 bg-white rounded-lg shadow-lg mt-4">
            <h3 class="text-lg font-semibold mb-2">
            <a href="{{ route('books.show', $book->id) }}" class="mb-4 text-lg font-semibold">{{$loop->iteration}}. {{ $book->title }}</a>
            </h3>
            <div class="text-gray-600 leading-relaxed mb-4">{{ $book->description }}</div>
            <div class="book-rating flex items-center">
                <div class="mr-2 text-sm font-medium text-slate-700">
                    {{ number_format($book->reviews_avg_rating, 1) }}
                    <x-star-rating :rating="$book->reviews_avg_rating ?? 0"/>
                </div>
                <span class="book-review-count text-sm text-gray-500">
                    {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                </span>
            </div>
            <a href="{{ route('books.show', $book->id) }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">View Book</a>
        </div>
    @endforeach

@endsection
