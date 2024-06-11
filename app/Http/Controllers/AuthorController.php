<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    // Méthode pour afficher tous les acteurs
    public function index()
    {
        $authors = Author::all();
        return response()->json($authors);
    }

    // Méthode pour afficher les détails d'un acteur
    public function show($id)
    {
        $author = Author::findOrFail($id);
        return response()->json($author);
    }

    // Méthode pour créer un nouveau acteur
    public function store(Request $request)
    {
        $author = Author::create([
            'name' => $request->input('newAuthor')
        ]);
        $authorId = $author->id;
        return response()->json($authorId, 201);
    }

    // Méthode pour mettre à jour les informations d'un acteur
    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        return response()->json($author, 200);
    }

    // Méthode pour supprimer un acteur
    public function destroy($id)
    {
        Author::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
