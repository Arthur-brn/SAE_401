<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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
        if ($book) {
            return response()->json($book, 201);
        } else {
            return response()->json(null, 404);
        }
    }

    public function checkFilm($id)
    {
        $film = Loan::where('loanable_type', 'like', '%Film%')
            ->where('loanable_id', $id)
            ->first();
        if ($film) {
            return response()->json($film, 201);
        } else {
            return response()->json(null, 404);
        }
    }

    public function checkLoans(Request $request)
    {
        $loans = Loan::where('loanable_type', $request->loanable_type)
            ->where('loanable_id', $request->loanable_id)
            ->where('user_id', $request->user_id)
            ->where('status', '!=', 'returned')
            ->first();
        return response()->json($loans, 201);
    }

    public function fetchLoanUser(Request $request)
    {
        $userId = $request->input('userId');

        if (!$userId) {
            return response()->json(['error' => 'userId is required'], 400);
        }

        $loans = Loan::where('user_id', $userId)
            ->where('status', 'add_to_cart')
            ->get();

        if ($loans->isEmpty()) {
            return response()->json(['message' => 'No loans found for this user with status add_to_cart'], 404);
        }

        $loans->each(function ($loan) {
            if ($loan->loanable_type === 'App\Models\Book') {
                $loan->load('loanable.author');
            } elseif ($loan->loanable_type === 'App\Models\Film') {
                $loan->load('loanable.director');
            }
        });

        return response()->json($loans);
    }

    public function bookItems(Request $request)
    {
        $userId = $request->input('userId');

        if (!$userId) {
            return response()->json(['error' => 'userId is required'], 400);
        }

        Loan::where('user_id', $userId)
            ->where('status', 'add_to_cart')
            ->update([
                'status' => 'booked',
                'start_date' => Carbon::now(),
            ]);

        return response()->json(['message' => 'Items reserved successfully'], 200);
    }
}
