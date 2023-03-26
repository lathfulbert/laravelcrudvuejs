<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $user;//Le modèle User est stocké dans la propriété protégée $user

    public function __construct(User $user)// injection de dépendance
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = $this->user->findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function store(Request $request)//crée un nouvel utilisateur
    {
        $this->user->create($request->all());
        return redirect()->route('users.index');
    }

    public function update(Request $request, $id)//mettent à jour
    {
        $user = $this->user->findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.show', $user->id);
    }

    public function destroy($id)//Supprime
    {
        $user = $this->user->findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
