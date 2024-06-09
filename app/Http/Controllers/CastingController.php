<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casting;

class CastingController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $castings = Casting::all();
        return response()->json($castings);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $casting = Casting::findOrFail($id);
        return response()->json($casting);
    }

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $casting = Casting::create($request->all());
        return response()->json($casting, 201);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $casting = Casting::findOrFail($id);
        $casting->update($request->all());
        return response()->json($casting, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        Casting::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function getFilmCasting($id){
        $cast = Casting::where('film_id', $id)->get();
        return response()->json($cast, 201);
    }
}
