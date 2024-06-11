<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Editor;

class EditorController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $editors = Editor::all();
        return response()->json($editors);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $editor = Editor::findOrFail($id);
        return response()->json($editor);
    }

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $editor = Editor::create([
            'name' => $request->input('newEditor')
        ]);
        $editorId = $editor->id;
        return response()->json($editorId, 201);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $editor = Editor::findOrFail($id);
        $editor->update($request->all());
        return response()->json($editor, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        Editor::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
