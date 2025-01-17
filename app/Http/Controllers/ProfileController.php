<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Afficher le formulaire d'édition du profil.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    /**
     * Mettre à jour les informations du profil de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validation des données
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
        ]);

        // Récupère l'utilisateur actuellement connecté
        $user = Auth::user();

        // Met à jour les informations de l'utilisateur
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Redirige l'utilisateur vers la page de modification du profil avec un message de succès
        return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès');
    }
}
