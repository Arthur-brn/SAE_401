<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $languages = Language::all();
        return response()->json($languages);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $language = Language::findOrFail($id);
        return response()->json($language);
    }

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $language = Language::create($request->all());
        return response()->json($language, 201);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);
        $language->update($request->all());
        return response()->json($language, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        Language::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
