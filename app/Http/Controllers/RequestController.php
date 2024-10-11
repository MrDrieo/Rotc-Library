<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Store a new book request by a student.
     */
    public function store(Request $request, Book $book)
    {
        if ($book->available_copies < 1) {
            return response()->json(['message' => 'Book is not available for borrowing'], 400);
        }

        $transaction = Transaction::create([
            'book_id' => $book->id,
            'student_id' => Auth::id(),
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Request submitted successfully', 'transaction' => $transaction], 201);
    }

    /**
     * Display a list of all pending requests (for librarians only).
     */
    public function index()
    {
        $pendingRequests = Transaction::with('book', 'student')
            ->where('status', 'pending')
            ->get();

        return response()->json($pendingRequests);
    }

    /**
     * Approve a book request (for librarians only).
     */
    public function approve(Transaction $transaction)
    {
        if ($transaction->status !== 'pending') {
            return response()->json(['message' => 'Request has already been processed'], 400);
        }

        $transaction->update(['status' => 'approved']);
        $transaction->book->decrement('available_copies');

        return response()->json(['message' => 'Request approved']);
    }

    /**
     * Deny a book request (for librarians only).
     */
    public function deny(Transaction $transaction)
    {
        if ($transaction->status !== 'pending') {
            return response()->json(['message' => 'Request has already been processed'], 400);
        }

        $transaction->update(['status' => 'denied']);

        return response()->json(['message' => 'Request denied']);
    }
}
