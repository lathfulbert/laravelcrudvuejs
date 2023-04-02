<?php

namespace App\Http\Controllers;

use App\Models\NiveauScolaire;
use Illuminate\Http\Request;

class NiveauScolaireController extends Controller
{
   
    public function index(){

        $niveauScolaires = NiveauScolaire::orderBy('nom','ASC')->paginate(2);

       // dd($niveauScolaires);
          
return inertia("NiveauScolaire/IndexNiveauScolaire", ["niveauScolaires" => $niveauScolaires]);

    }

  
}
