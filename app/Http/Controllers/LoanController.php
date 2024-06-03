<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::where('user_id', $_SESSION['userId'])->with('loanable')->get();
        return response()->json($loans);
    }

    public function add(Request $request)
    {
        $request->validate([
            'loanable_id' => 'required|integer',
            'loanable_type' => 'required|string',
            'start_date' => 'required|date',
            // Ajoute d'autres validations si nécessaire
        ]);

        $user = Auth::user();

        if ($request->input('loanable_type') === 'book') {
            $loanable = Book::findOrFail($request->input('loanable_id'));
        } elseif ($request->input('loanable_type') === 'film') {
            $loanable = Film::findOrFail($request->input('loanable_id'));
        } else {
            return response()->json(['message' => 'Type de ressource non supporté'], 400);
        }

        // Créer une réservation
        $loan = new Loan();
        $loan->loanable()->associate($loanable);
        $loan->user()->associate($user);
        $loan->start_date = $request->input('start_date');
        $loan->status = 'booked'; // Statut initial de la réservation
        $loan->save();

        return response()->json($loan, 201);
    }
}
