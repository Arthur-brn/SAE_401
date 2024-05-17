<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AudioLanguage;

class AudioLanguageController extends Controller
{
    // Méthode pour afficher tous les acteurs
    public function index()
    {
        $audio_languages = AudioLanguage::all();
        return response()->json($audio_languages);
    }

    // Méthode pour afficher les détails d'un acteur
    public function show($id)
    {
        $audio_language = AudioLanguage::findOrFail($id);
        return response()->json($audio_language);
    }

    // Méthode pour créer un nouveau acteur
    public function store(Request $request)
    {
        $audio_language = AudioLanguage::create($request->all());
        return response()->json($audio_language, 201);
    }

    // Méthode pour mettre à jour les informations d'un acteur
    public function update(Request $request, $id)
    {
        $audio_language = AudioLanguage::findOrFail($id);
        $audio_language->update($request->all());
        return response()->json($audio_language, 200);
    }

    // Méthode pour supprimer un acteur
    public function destroy($id)
    {
        AudioLanguage::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
