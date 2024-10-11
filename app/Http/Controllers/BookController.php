<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of books with availability status.
     */
    public function index()
    {
        $books = Book::all()->map(function ($book) {
            $book->is_available = $book->available_copies > 0;
            return $book;
        });

        return response()->json($books);
    }

    /**
     * Store a new book (for librarians only).
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'available_copies' => 'required|integer|min:1',
        ]);

        $book = Book::create($request->only(['title', 'author', 'available_copies']));

        return response()->json(['message' => 'Book added successfully', 'book' => $book], 201);
    }

    /**
     * Update an existing book (for librarians only).
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'author' => 'sometimes|string|max:255',
            'available_copies' => 'sometimes|integer|min:1',
        ]);

        $book->update($request->only(['title', 'author', 'available_copies']));

        return response()->json(['message' => 'Book updated successfully', 'book' => $book]);
    }

    /**
     * Remove a book from the collection (for librarians only).
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}
