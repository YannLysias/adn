<?php

namespace App\Http\Controllers;

 
use ProtoneMedia\Splade\Facades\Toast;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

     public function diasporaPDF()
     {
             $options = new Options();
             $options->set('isHtml5ParserEnabled', true);
             
             $dompdf = new Dompdf($options);
             $dompdf->setBasePath(public_path());
             // Récupérez les données des utilisateurs
             $adherants = User::where('categorie', 'Diaspora')
                 ->orderBy('nom') // Tri par ordre alphabétique du nom
                 ->get();
 
             // Générez le contenu HTML du tableau
             $html = view('pdfdiaspo', compact('adherants'))->render();
 
             
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
     return $dompdf->stream("liste_diaspora.pdf");
 
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
            'telephone' => 'required|unique:users,telephone|max:255',
            'fonction' => 'required|max:255',
            'email' => 'nullable|email|unique:users,email',
            'ravip' => 'nullable|max:255',
            'profession' => 'required|max:255',
            'npi' => 'nullable|max:255',
            'photo' => 'nullable|mimes:jpg,png,jpeg',
            'pays' => 'nullable|max:255',
            
                

        ]);

        if ($request->has('photo')) {
            $path_photo = Storage::putFile('public/photos', $request->photo);
            $path_photo_convert_to_table = explode('/', $path_photo);
        }

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
            'fonction' => $request->fonction,
            'pays' => $request->pays,
            'npi' => $request->npi,
            'active' => false,
            'photo' => null,


        ]);

// Toast::title('Whoops!')
//     ->message('No space left')
//     ->warning()
//     ->leftTop()
//     ->backdrop()
//     ->autoDismiss(15);
        return redirect()->route('welcome')->with('success', 'Votre inscription a été Reçu avec succès');

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
            'fonction' => 'required|max:255',
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
        $diaspora->fonction = $request->fonction;
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

        return redirect()->back()->with('success', 'Diaspora ' . $diaspora->nom . ' ' . $diaspora->prenom . ' a été supprimé avec succès.');
    }
}
