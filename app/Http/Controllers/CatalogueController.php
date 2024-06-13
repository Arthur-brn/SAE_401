<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Film;

class CatalogueController extends Controller
{
    public function allArticles()
    {
        // Récupérer tous les livres avec les IDs modifiés
        $books = Book::all()->map(function ($book) {
            return [
                'article' => 'book',
                'id' => $book->id,
                'title' => $book->title,
                'picture' => $book->picture,
                'author' => $book->author ? $book->author->name : null,
                'editor' => $book->editor ? $book->editor->name : null,
                'language_id' => $book->language_id,
                'style' => $book->style,
                'type' => $book->type,
                'summary' => $book->summary,
                'page_number' => $book->page_number,
                'edition_year' => $book->edition_year,
                'copy_number' => $book->copy_number,
                'loan_number' => $book->loan_number,
            ];
        });

        // Récupérer tous les films avec les IDs modifiés
        $films = Film::all()->map(function ($film) {
            return [
                'article' => 'film',
                'id' => $film->id,
                'title' => $film->title,
                'picture' => $film->picture,
                'director' => $film->director ? $film->director->name : null,
                'style' => $film->style,
                'type' => $film->type,
                'age_limit' => $film->age_limit,
                'summary' => $film->summary,
                'duration' => $film->duration,
                'year' => $film->year,
                'copy_number' => $film->copy_number,
                'loan_number' => $film->loan_number,
            ];
        });

        // Fusionner les collections de livres et de films
        $articles = $books->merge($films);

        // Retourner la réponse JSON avec les articles fusionnés
        return response()->json($articles);
    }
}
