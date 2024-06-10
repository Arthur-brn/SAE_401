<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $films = Film::all();
        return response()->json($films);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $film = Film::findOrFail($id);
        return response()->json($film);
    }

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $film = Film::create($request->all());
        return response()->json($film, 201);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);
        $film->update($request->all());
        return response()->json($film, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        Film::findOrFail($id)->delete();
        return response()->json(null, 201);
    }

    // Méthode pour récupérer le livre avec le plus grand nombre de prêts
    public function mostLoanedFilm()
    {
        $film = Film::orderBy('loan_number', 'desc')->first();
        return response()->json($film);
    }

    // Méthode pour récupérer les livres les plus récents
    public function latestFilms()
    {
        $films = Film::with('director')->orderBy('created_at', 'desc')->take(10)->get();
        return response()->json($films);
    }

    // Méthode pour récupérer les livres avec les nombres de prêts les plus élevés
    public function mostLoanedFilms()
    {
        $films = Film::with('director')->orderBy('loan_number', 'desc')->take(11)->get();
        // Exclure le premier élément de la collection car déjà affiché au dessus
        $filmsExcludingFirst = $films->slice(1);
        return response()->json($filmsExcludingFirst->values());
    }
}
