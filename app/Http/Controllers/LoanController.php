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

    public function countBook($id)
    {
        $loans = Loan::where('loanable_type', 'like', '%Book%')
                     ->where('loanable_id', $id)
                     ->where('status', '!=', 'returned')
                     ->count();

        return response()->json($loans, 201);
    }

    public function countFilm($id)
    {
        $loans = Loan::where('loanable_type', 'like', '%Film%')
                     ->where('loanable_id', $id)
                     ->where('status', '!=', 'returned')
                     ->count();

        return response()->json($loans, 201);
    }

    public function removeLoan($loanRef)
    {
        Loan::where('booking_number', $loanRef)->delete();
        return response()->json(null, 201);
    }

    public function checkBook($id)
    {
        $book = Loan::where('loanable_type', 'like', '%Book%')
                    ->where('loanable_id', $id)
                    ->first();
        if($book)
        {
            return response()->json($book, 201);
        }
        else
        {
            return response()->json(null, 404);
        }
    }

    public function checkFilm($id)
    {
        $film = Loan::where('loanable_type', 'like', '%Film%')
                    ->where('loanable_id', $id)
                    ->first();
        if($film)
        {
            return response()->json($film, 201);
        }
        else
        {
            return response()->json(null, 404);
        }
    }
}
