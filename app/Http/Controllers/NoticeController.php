<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $notices = Notice::all();
        return response()->json($notices);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        return response()->json($notice);
    }

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $notice = Notice::create($request->all());
        return response()->json($notice, 201);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $notice = Notice::findOrFail($id);
        $notice->update($request->all());
        return response()->json($notice, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        Notice::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
