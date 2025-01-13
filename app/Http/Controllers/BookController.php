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
            default => $books->latest()
        };

        // $books = $books->get();

        $cacheKey = 'books:' . $filter . ':' . $title;
        // $book = Cache::remember('books', 3600, fn() => $books->get());
        $books = cache()->remember($cacheKey, 3600, fn() => $books->get());
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view(
            'books.show',
            [
                'book' =>$book->load([
                    'reviews' => fn($query) => $query->latest()
                ])
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->validated());
        return redirect()->route('books.show', ['book' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
