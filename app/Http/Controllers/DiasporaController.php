<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DiasporaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $diasporaUsers = User::where('categorie', 'Diaspora')->get();

        return view('diaspora', ['diasporaUsers' => $diasporaUsers]);
    }

    /**
     * Show the form for creating a new resource.
     */

     public function generatePDF()
     {
             $options = new Options();
             $options->set('isHtml5ParserEnabled', true);
             
             $dompdf = new Dompdf($options);
             $dompdf->setBasePath(public_path());
             // Récupérez les données des utilisateurs
             $adherants = User::all();
 
             // Générez le contenu HTML du tableau
             $html = view('pdf', compact('adherants'))->render();
 
             
             // Chargez le contenu HTML dans Dompdf
             $dompdf->loadHtml($html);
 
             // Activer la numérotation des pages
             $options->set('isPhpEnabled', true);
             $options->set('isHtml5ParserEnabled', true);
             $options->set('isPhpEnabled', true);
             $options->set('isHtml5ParserEnabled', true);
 
             // Charger les options dans Dompdf
             $dompdf->setOptions($options);
             
             // Rendre le PDF
             $dompdf->render();
             
             // Envoyer le PDF à la sortie
     return $dompdf->stream("liste_utilisateurs.pdf");
 
 }

    public function create()
    {
        return view('/ajout_diaspora');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'sexe' => 'required|max:255',
            'telephone' => 'required|max:255',
            //'email' => 'email|unique:users,email|max:255',
            //'ravip' => 'required|max:255',
            'profession' => 'required|max:255',
            
            //'npi' => 'required|max:255',
            //'photo' => 'mimes:jpg,png,jpeg',
            //'pays' => 'required|max:255',
                

        ]);

        $admin = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'type' =>  'Adhérent',
            'email' => $request->email,
            'password' => 'Null',
            'ravip' => $request->ravip,
            'profession' => $request->profession,
            'statut' => $request->statut,
            'categorie' => 'Diaspora',
            'pays' => $request->pays,
            'npi' => $request->npi,
            'active' => false,
            'photo' => 'Null',


        ]);

        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Récupérez l'utilisateur en fonction de l'ID fourni
        // $user = User::with('quartier')->findOrFail($id);
        $diaspora = User::findOrFail($id);
        
        // Passez les détails de l'utilisateur à la vue
        return view("users-diaspora", compact('diaspora'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $diaspora = User::where('id', (int) $id)->first();


         return view('edit-diaspora', compact('diaspora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'sexe' => 'required|max:255',
            'telephone' => 'required|max:255',
            'type' => 'required|max:255',
            //'email' => 'required|email|unique:users,email',
            //'ravip' => 'required|max:255',
            'profession' => 'required|max:255',
            'statut' =>    'required|max:255',
            'categorie' =>    'required|max:255',
            

        ]);
        
        $diaspora = User::where('id', (int) $id)->first();
      
        
        $diaspora->nom = $request->nom;
        $diaspora->prenom = $request->prenom;
        $diaspora->sexe = $request->sexe;
        $diaspora->telephone = $request->telephone;
        $diaspora->type = $request->type;
        $diaspora->email = $request->email;
        $diaspora->profession = $request->profession;
        $diaspora->statut = $request->statut;
        $diaspora->categorie = $request->categorie;

        $diaspora->save();

        return redirect()->route('diaspora.index')->with('success', 'Modifier avec success');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diaspora = User::findOrFail($id);
        $diaspora->delete();

        return redirect()->back()->with('success', 'Adhérant ' . $diaspora->nom . ' ' . $diaspora->prenom . ' a été supprimé avec succès.');
    }
}