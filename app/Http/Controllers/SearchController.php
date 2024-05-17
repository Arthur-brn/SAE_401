<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Remplacez par votre modèle

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Utiliser LIKE pour trouver des correspondances approximatives
        $results = Book::where('name', 'LIKE', "%{$query}%")->get();

        // Utiliser Levenshtein pour améliorer les résultats
        $results = $results->filter(function ($item) use ($query) {
            return levenshtein($item->name, $query) <= 3; // Ajustez la tolérance selon vos besoins
        });

        return view('search.results', compact('results'));
    }
}
