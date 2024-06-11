<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

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

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $Review = Review::create($request->all());
        return response()->json($Review, 201);
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
        return response()->json($reviews,201);
    }

    public function getFilmReview($id)
    {
        $reviews = Review::where('reviewable_type', 'App\\Models\\Film')
                         ->where('reviewable_id', $id)
                         ->get();
        return response()->json($reviews, 201);
    }
}
