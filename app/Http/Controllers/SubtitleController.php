<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subtitle;

class SubtitleController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $subtitles = Subtitle::all();
        return response()->json($subtitles);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $subtitle = Subtitle::findOrFail($id);
        return response()->json($subtitle);
    }

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $subtitle = Subtitle::create($request->all());
        return response()->json($subtitle, 201);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $subtitle = Subtitle::findOrFail($id);
        $subtitle->update($request->all());
        return response()->json($subtitle, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        Subtitle::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
