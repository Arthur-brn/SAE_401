<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

class DirectorController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $directors = Director::all();
        return response()->json($directors);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $director = Director::findOrFail($id);
        return response()->json($director);
    }

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $director = Director::create([
            'name' => $request->input('newDirector')
        ]);
        $directorId = $director->id;
        return response()->json($directorId, 201);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $director = Director::findOrFail($id);
        $director->update($request->all());
        return response()->json($director, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        Director::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
