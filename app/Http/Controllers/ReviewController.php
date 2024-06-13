<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Carbon\Carbon;

class ReviewController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $Reviews = Review::all();
        return response()->json($Reviews);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $Review = Review::findOrFail($id);
        return response()->json($Review);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $Review = Review::findOrFail($id);
        $Review->update($request->all());
        return response()->json($Review, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function getBookReview($id)
    {
        $reviews = Review::where('reviewable_type', 'App\\Models\\Book')
            ->where('reviewable_id', $id)
            ->get();
        return response()->json($reviews, 201);
    }

    public function getFilmReview($id)
    {
        $reviews = Review::where('reviewable_type', 'App\\Models\\Film')
            ->where('reviewable_id', $id)
            ->get();
        return response()->json($reviews, 201);
    }

    public function store(Request $request)
    {
        // Validation des données reçues du formulaire
        $request->validate([
            'review_content' => 'required|string',
            'review_mark' => 'required|integer|min:0|max:5',
            'user_id' => 'required|integer',
            'reviewable_id' => 'required|integer',
            'reviewable_type' => 'required|string',
        ]);

        try {
            // Création de la review
            $review = new Review();
            $review->review_content = $request->input('review_content');
            $review->review_mark = $request->input('review_mark');
            $review->user_id = $request->input('user_id'); // ID de l'utilisateur connecté
            $review->reviewable_id = $request->input('reviewable_id');
            $review->reviewable_type = $request->input('reviewable_type');

            // Sauvegarde de la review
            $review->save();

            return response()->json(['message' => 'Review ajoutée avec succès', 'review' => $review], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de l\'ajout de la review', 'error' => $e->getMessage()], 500);
        }
    }
}
