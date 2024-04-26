<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display form to register a new book.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Stocke un nouveau livre dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:author,id',
            'editor' => 'required|string|max:255',
            'style' => 'required|string|max:255',
            'page_number' => 'required|integer|min:1',
            'edition_date' => 'required|date',
            'loan_number' => 'required|integer|min:0',
            'type' => 'required|string|max:255',
            'summary' => 'required|string|max:1255',
        ]);

        Book::create($request->all());

        return redirect()->route('book.store')->with('success', 'Le livre a été ajouté avec succès !');
    }
}
