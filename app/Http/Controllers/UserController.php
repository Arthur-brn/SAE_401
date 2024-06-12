<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // Méthode pour afficher tous les livres
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Méthode pour afficher les détails d'un livre
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Méthode pour créer un nouveau livre
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    // Méthode pour mettre à jour les informations d'un livre
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    // Méthode pour supprimer un livre
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        // Vérifier si l'utilisateur existe et le mot de passe est correct
        if ($user && Hash::check($request->password, $user->password)) {
            // L'utilisateur existe et le mot de passe est correct
            return response()->json($user, 200);
        } else {
            // L'utilisateur n'existe pas ou le mot de passe est incorrect
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    public function getCustomerInfo($userId)
    {
        $user = User::findOrFail($userId);
        if ($user) {
            return response()->json($user, 200);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }
}
