<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Gère la soumission du formulaire de connexion.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);



        if (Auth::attempt($credentials)) {
            // Log the user information
            \Log::info('User logged in:', [
                'id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ]);
            return redirect()->route('home')->with('success', 'Connexion réussie! Bienvenue ' . Auth::user()->name);
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }

    /**
     * Affiche le formulaire d'enregistrement.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Gère la soumission du formulaire d'enregistrement.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // \Log::info('Password:', ['password' => $request->password]);
        // \Log::info('Password Confirmation:', ['password_confirmation' => $request->password_confirmation]);

        $validated = $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|min:6|confirmed',
        ]);

        // Créer un utilisateur
        $user = User::create([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        // Authentifier l'utilisateur
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Inscription réussie !');
    }

    /**
     * Déconnecte l'utilisateur actuellement authentifié.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home')->with('success', 'Déconnexion réussie.');
    }
}
