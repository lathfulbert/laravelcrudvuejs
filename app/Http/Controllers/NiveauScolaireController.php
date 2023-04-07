<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NiveauScolaire;
use Illuminate\Validation\Rule;

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


    public function show($id)
    {
       /* $niveau = $this->niveau->findOrFail($id);
        return view('niveau.show', compact('niveau'));
        */
    }

    public function edit(NiveauScolaire $niveauScolaire)
    {
        return response()->json(["niveauScolaire" => $niveauScolaire]);
    }


    public function update(Request $request , NiveauScolaire $niveauScolaire) //crée un nouvel utilisateur
    {
        //$this->niveau->create($request->all());

        $request->validate([
            "nom" => [
                "required",
                Rule::unique((new NiveauScolaire)->getTable(),"nom")->ignore($niveauScolaire->id)
                ]
        ]);


        if($request->nom != $niveauScolaire->nom){

             $niveauScolaire->nom = $request->nom;

            $niveauScolaire->save();  

        }

        return redirect()->back();
    }



  
}
