<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
{
    $user = Auth::user(); // Get the logged-in user
    return view('profile.edit', ['user' => $user]); // Pass $user to the view
}



    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
{
    // Valider les données
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
    ]);

    // Récupérer l'utilisateur authentifié
    $user = Auth::user();

    // Mettre à jour les informations de l'utilisateur
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    // Rediriger vers le profil après la mise à jour
    return redirect()->route('profile.show');
}





    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function show()
{
    $user = auth()->user();
    return view('profile.show', compact('user'));
}



}
