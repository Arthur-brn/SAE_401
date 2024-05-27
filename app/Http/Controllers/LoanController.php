<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $loans = Loan::all();
        return response()->json($loans);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $loan = Loan::findOrFail($id);
        return response()->json($loan);
    }

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $loan = Loan::create($request->all());
        return response()->json($loan, 201);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->update($request->all());
        return response()->json($loan, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        Loan::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}