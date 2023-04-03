<?php

namespace App\Http\Controllers;

use App\Models\NiveauScolaire;
use Illuminate\Http\Request;

class NiveauScolaireController extends Controller
{

    protected $niveau; //Le modèle User est stocké dans la propriété protégée $user

    public function __construct(NiveauScolaire $niveau) // injection de dépendance
    {
        $this->niveau = $niveau;
    }
    
    
    public function index(){

        //  $niveauScolaires = NiveauScolaire::orderBy('nom','ASC')->paginate(2);
        $niveauScolaires = NiveauScolaire::latest()->paginate(5);

       // dd($niveauScolaires);
          
return inertia("NiveauScolaire/IndexNiveauScolaire", ["niveauScolaires" => $niveauScolaires]);

    }



    public function store(Request $request) //crée un nouvel utilisateur
    {
        //$this->niveau->create($request->all());

        $request->validate([
            "nom" => "required|unique:App\Models\NiveauScolaire"
        ]);

        NiveauScolaire::create(["nom" => $request->nom]);
        
        return redirect()->back();
    }

  
}
