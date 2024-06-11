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
        $imgDir = './assets/img/dvd/';
        $filmData = $request->all();
        $filmPic = $filmData['picture'];
        $filename = time() . '_' . $filmPic->getClientOriginalName();
        $filmPic->move(public_path($imgDir), $filename);
        $filmData['picture'] = $filename;
        $film = Film::create($filmData);
        $filmId = $film->id;
        return response()->json($filmId, 201);
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
}
