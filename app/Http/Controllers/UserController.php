<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    // constructeur de la classe : permet d'appliquer un comportement avant d'acceder à une des methodes de la classe
    // Ici on verifie que l'utilisateur est bien connecté avec le middleware "auth"

    public function __construct()
    {
        $this->middleware('auth');
    }

    // INDEX : affiche la page avec les infos du compte

    public function index()
    {
        $user = Auth::user();
        return view('user.account', ['user' => $user]);
    }

    // Edit : affiche la page de modification des infos du compte

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    // Update : Permet de valider les modifications effectuées

    public function update(Request $request, User $user)
    {
        $request->validate([
            'pseudo' => 'required|min:3|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // on recupere les donnees de base de l'utilisateur

        $user = Auth::user();

        // on modifie les infos de l'utilisateur

        $user->pseudo = $request->input('pseudo');

        // si une image est uplodée : on la sauvegarde avec le helper uploadimage
        // sinon : on lui donne une valeur nulle
        // $user->image = isset($request['image']) ? uploadImage($request['image']) : $user->image;

        $user->save(); //on sauvegarde les changements en BDD

        return redirect()->route('user.account')->with('message', 'le compte a bien été modifié');
    }

    // UPDATEPASSWORD : permet de valider la modification du mot de passe

    // public function updatePassword(Request $request)
    // {
    //     $request->validate([
    //         'password' => 'required',
    //         'newPassword' => 
    //     ]);
    // }

    public function show()
    {

    }
}
