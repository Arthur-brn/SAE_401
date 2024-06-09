<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return response()->json(null, 201);
    }

    // Méthode pour récupérer le livre avec le plus grand nombre de prêts
    public function mostLoanedBook()
    {
        $book = Book::orderBy('loan_number', 'desc')->first();
        return response()->json($book);
    }

    // Méthode pour récupérer les livres les plus récents
    public function latestBooks()
    {
        $books = Book::with('author')->orderBy('created_at', 'desc')->take(10)->get();
        return response()->json($books);
    }

    // Méthode pour récupérer les livres avec les nombres de prêts les plus élevés
    public function mostLoanedBooks()
    {
        $books = Book::with('author')->orderBy('loan_number', 'desc')->take(10)->get();
        return response()->json($books);
    }
}
