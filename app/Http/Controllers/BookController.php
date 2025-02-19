<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Cache;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->input('title');
        $filter = $request->input('filter', '');

        $books = Book::when(
            $title,
            fn ($query, $title) => $query->title($title)
        );
        $books = match ($filter) {
            'popular_last_month' => $books->popularLastMonth(),
            'popular_last_6months' => $books->popularLast6Months(),
            'highest_rated_last_month' => $books->highestRatedLastMonth(),
            'highest_rated_last_6months' => $books->highestRatedLast6Months(),
            default => $books->latest()->withAvgRating()->withReviewsCount()
        };

        // $books = $books->get();

        $cacheKey = 'books:' . $filter . ':' . $title . ':page:' . $request->input('page', 1);
        // $book = Cache::remember('books', 3600, fn() => $books->get());
        $books = cache()->remember($cacheKey, 3600, fn() => $books->paginate(10));
        // $books = cache()->remember($cacheKey, 3600, function () use ($books) {
        //     dd('Not from cache');// This will be executed if the cache is missed, the first time the cache is missed
        //     return $books->get();
        // });


        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());
        return redirect()->route('books.index', ['book' => $book])
        ->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $book)
    {

        $cacheKey = 'book:' . $book;

        $book = cache()->remember($cacheKey,
        3600,
        fn() =>
        Book::with([
            'reviews' => fn($query) => $query->latest()
        ])->withAvgRating()->withReviewsCount()->findOrFail($book)
    );

        return view('books.show',['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]));
        return redirect()->route('books.show', ['book' => $book])
        ->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        cache()->flush();
        return redirect()->route('books.index')
        ->with('success', "$book->title Book deleted successfully");
    }
}
