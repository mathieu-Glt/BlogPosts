<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;  // Pour la classe Log
use Illuminate\Support\Facades\Auth; // Pour la façade Auth


class CheckProfileAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est authentifié
        if (Auth::check()) {  // Utilisez Auth::check() ici pour vérifier si l'utilisateur est authentifié
            // Si l'utilisateur est authentifié, on récupère ses informations
            $user = Auth::user();  // Utilisez Auth::user() pour récupérer l'utilisateur authentifié

            // Log des informations de l'utilisateur (par exemple son ID, email, IP, etc.)
            Log::info('Utilisateur authentifié :', [
                'id' => $user->id,
                'name' => $user->name,     // Le nom de l'utilisateur
                'email' => $user->email,   // L'email de l'utilisateur
                'ip' => $request->ip(),    // L'adresse IP de l'utilisateur
                'user_agent' => $request->userAgent() // L'agent utilisateur (navigateur)
            ]);

            // Continue la requête en permettant l'accès aux routes suivantes
            return $next($request);
        }

        // Si l'utilisateur n'est pas authentifié, on le redirige vers la page de connexion
        return redirect()->route('login');
    }
}
