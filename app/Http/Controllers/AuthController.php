<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        // traitement du formulaire de login
        $credentials = $request->validate([
            'email' => [ 'required', 'email' ],
            'password' => [ 'required' ]
        ]);

        // tenter une connexion
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors(['login' => 'La combinaison email/mot de passe fournie ne permet pas de vous connecter'])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function registration() {
        return view('auth.registration');
    }

    public function register(Request $request) {
        // validation
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        // vérficiations complémentaires
        if($request->input('password') !== $request->input('password_confirmation')) {
            return back()->withErrors(['password' => 'Le mot de passe et la confirmation de mot de passe ne correspondent pas.']);
        }

        // persistance
        $isCreated = User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // retour à l'utilisateur
        if($isCreated) {
            return redirect()->route('login')->with('success', 'Votre compte à correctement été créer, vous pouvez à présent vous connecter');
        }
        return back()->withErrors(['register' => 'Erreur lors de la création du compte'])->onlyInput(['firstname', 'lastname', 'email']);
    }
}
