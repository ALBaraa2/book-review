@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            <li>{{ session('success') }}</li>
        </div>
    @endif

    <div class="mb-4">
        <h1 class="sticky top-0 mb-2 text-2xl">{{ $book->title }}</h1>

        <div class="book-info">
        <div class="book-author mb-4 text-lg font-semibold">by {{ $book->author }}</div>
        <div class="text-gray-600 leading-relaxed mb-6">{{ $book->description }}</div>
        <div class="book-rating flex items-center">
            <div class="mr-2 text-sm font-medium text-slate-700">
            {{ number_format($book->reviews_avg_rating, 1) }}
            <x-star-rating :rating="$book->reviews_avg_rating ?? 0"/>
            </div>
            <span class="book-review-count text-sm text-gray-500">
            {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
            </span>
        </div>
        </div>
    </div>

    <hr class="my-4">

    <div class="mb-10">
        <a href="{{ route('books.index') }}" class="link">🔙 Go back to the task list!</a>
    </div>

    <div class="mb-4 flex space-x-6">
        <a href="{{ route('books.reviews.create', $book) }}" class="reset-link">Add a review</a>
        <a href="{{ route('books.edit', $book) }}" class="reset-link">Edit</a>
    </div>

    <div class="mb-4">

    </div>

    <div>
        <h2 class="mb-4 text-xl font-semibold">Reviews</h2>
        <ul>
        @forelse ($book->reviews as $review)
            <li class="book-item mb-4">
            <div>
                <div class="mb-2 flex items-center justify-between">
                    <div class="font-semibold">
                        <x-star-rating :rating="$review->rating" />
                    </div>
                <div class="book-review-count">
                    {{ $review->created_at->format('M j, Y') }}</div>
                </div>
                <p class="text-gray-700">{{ $review->review }}</p>
            </div>
            </li>
        @empty
            <li class="mb-4">
            <div class="empty-book-item">
                <p class="empty-text text-lg font-semibold">No reviews yet</p>
            </div>
            </li>
        @endforelse
        </ul>
    </div>
@endsection
