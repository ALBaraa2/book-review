@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2x1">Add Review for {{ $book->title }}</h1>
    <form method="POST" action="{{ route('books.reviews.store', $book) }}">
        @csrf
        <label for="review">Review</label>
        <textarea placeholder="Your review must be at least 15 characters" name="review" id="review" required class="input mb-4"></textarea>
        <label for="rating">Rating</label>
        <select name="rating" id="rating" class="input mb-4" required>
          <option value="">Select a Rating</option>
          @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
        <div class="flex space-x-2">
            <button type="submit" class="btn">Add Review</button>
            <a href="{{ route('books.show', $book) }}" class="btn-cancel">Cancel</a>
        </div>
      </form>
@endsection
