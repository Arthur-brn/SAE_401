<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    // Méthode pour afficher tous les acteurs
    public function index()
    {
        $actors = Actor::all();
        return response()->json($actors);
    }

    // Méthode pour afficher les détails d'un acteur
    public function show($id)
    {
        $actor = Actor::findOrFail($id);
        return response()->json($actor);
    }

    // Méthode pour créer un nouveau acteur
    public function store(Request $request)
    {
        $actor = Actor::create($request->all());
        return response()->json($actor, 201);
    }

    // Méthode pour mettre à jour les informations d'un acteur
    public function update(Request $request, $id)
    {
        $actor = Actor::findOrFail($id);
        $actor->update($request->all());
        return response()->json($actor, 200);
    }

    // Méthode pour supprimer un acteur
    public function destroy($id)
    {
        Actor::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
