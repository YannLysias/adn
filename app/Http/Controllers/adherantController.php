<?php

namespace App\Http\Controllers;

use App\Models\Arrondissement;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\Quartier;
use App\Models\Titre;
use App\Models\User;
use App\Notifications\NewCollaborateur;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class adherantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        if (auth()->user()->type === 'Coordonnateur') {
            $users = User::whereNotIn('type', ['Coordonnateur', 'Administrateur'])
            ->orderBy('id', 'desc')
            ->get();
        } elseif (auth()->user()->type === 'Administrateur') {
            $users = User::where('type', 'Coordonnateur')->latest()
            ->orderBy('id', 'desc')
            ->get();
        } else {
            // Les autres types d'utilisateurs ne peuvent pas voir les coordonnateurs
            $users = [];
            $users = User::orderBy('id', 'desc')->get();
        }
        $departements = Departement::all();

        return view('adherant', [
            'adherants' => $users,
            'quartiers' => [],
            'departements' => $departements,
            'communes' => [],
            'arrondissements' => [],

        ]);
    }

    public function generatePDF()
    {
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            
            $dompdf = new Dompdf($options);
            
            // Récupérez les données des utilisateurs
            $adherants = User::all();
            
            // Générez le contenu HTML du tableau
            $html = view('adherant', compact('adherants'))->render();
            
            // Chargez le contenu HTML dans Dompdf
            $dompdf->loadHtml($html);
            
            // Rendre le PDF
            $dompdf->render();
            
            // Envoyer le PDF à la sortie
    return $dompdf->stream("liste_utilisateurs.pdf");

}
    
   


    public function filter(Request $request)
    {
        if ($request->has('departement_id')) {
            $usersQuery = User::query();
    
            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }
            $usersQuery->where('departement_id', intval($request->query('departement_id')));
            $users = $usersQuery->get();
    
            return response()->json($users);
        }

        if ($request->has('commune_id')) {
            $usersQuery = User::query();
    
            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }
            $usersQuery->where('commune_id', intval($request->query('commune_id')));
            $users = $usersQuery->get();
    
            return response()->json($users);
        }

        if ($request->has('arrondissement_id')) {
            $usersQuery = User::query();
    
            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }
            $usersQuery->where('arrondissement_id', intval($request->query('arrondissement_id')));
            $users = $usersQuery->get();
    
            return response()->json($users);
        }

        if ($request->has('quartier_id')) {
            $usersQuery = User::query();
    
            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }
            $usersQuery->where('quartier_id', intval($request->query('quartier_id')));
            $users = $usersQuery->get();
    
            return response()->json($users);
        }
    }
        
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $titres = Titre::all();
        $quartiers = Quartier::all();
        $departements = Departement::all();
        $communes = Commune::all();
        $arrondissements = Arrondissement::all();

        return view('ajout_adherant', [
            'titres' => $titres,
            'quartiers' => $quartiers,
            'departements' => $departements,
            'communes' => $communes,
            'arrondissements' => $arrondissements,
        ]);
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
            'type' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|min:8',
            'ravip' => 'required|max:255',
            'profession' => 'required|max:255',
            'statut' =>    'required|max:255',
            'npi' => 'required|max:255',
            'photo' => 'required|mimes:jpg,png,jpeg',
            'titre_id' => 'required|max:255',
            'quartier_id' => 'required|max:255',
            'arrondissement_id' => 'required|max:255',
            'departement_id' => 'required|max:255',
            'commune_id' => 'required|max:255',


        ]);


        $path_photo = Storage::putFile('public/photos', $request->photo);
        $path_photo_convert_to_table = explode('/', $path_photo);

        if ($request->has('photo')) {
            $path_photo = Storage::putFile('public/photos', $request->photo);
            $path_photo_convert_to_table = explode('/', $path_photo);
        }

        $titre = Titre::findOrFail(intval($request->titre_id));

        $departement = Departement::findOrFail(intval($request->departement_id));
        $commune = Commune::findOrFail(intval($request->commune_id));
        $arrondissement = Arrondissement::findOrFail(intval($request->arrondissement_id));
        $quartier = Quartier::findOrFail(intval($request->quartier_id));


        
        if($request->type=='Coordonnateur')
            $generated_password = Str::random(8);
       


        $admin = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'type' => $request->type,
            'email' => $request->email,
            'ravip' => $request->ravip,
            'profession' => $request->profession,
            'npi' => $request->npi,
            'photo' => $request->has('photo') ? $path_photo_convert_to_table[2] : null,
            'statut' => $request->statut,
            'titre_id' => $titre->id,
            'quartier_id' => $quartier->id,
            'arrondissement_id' => $arrondissement->id,
            'departement_id' => $departement->id,
            'commune_id' => $commune->id,

        ]);

        if($request->type=='Coordonnateur')
        {
            $admin->password = $generated_password;
            $admin->save();

            Notification::send($admin, new NewCollaborateur([
                'email' => $admin->email,
                'password' => $generated_password,
            ]));
        }        

        return redirect()->route('adherant.index')->with('success', 'Formulaire soumis avec succès!');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        // Récupérez l'utilisateur en fonction de l'ID fourni
        // $user = User::with('quartier')->findOrFail($id);
        $user = User::findOrFail($id);
        
        // Passez les détails de l'utilisateur à la vue
        return view("users-profile", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $adherant = User::where('id', (int) $id)->first();
        $titres = Titre::all();
        $quartiers = Quartier::all();
        $departements = Departement::all();
        $communes = Commune::all();
        $arrondissements = Arrondissement::all();


        return view('edit-adherant', compact('adherant', 'titres', 'quartiers', 'departements', 'communes', 'arrondissements'));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:255',
            'ravip' => 'required|max:255',
            'profession' => 'required|max:255',
            'statut' =>    'required|max:255',
            'npi' => 'required|max:255',
            'photo' => 'required|mimes:jpg,png,jpeg',
            'titre_id' => 'required|max:255',
            'quartier_id' => 'required|max:255',
            'arrondissement_id' => 'required|max:255',
            'departement_id' => 'required|max:255',
            'commune_id' => 'required|max:255',

        ]);
        $adherant = User::where('id', (int) $id)->first();

        $titre = Titre::findOrFail(intval($request->titre_id));

        $departement = Departement::findOrFail(intval($request->departement_id));
        $commune = Commune::findOrFail(intval($request->commune_id));
        $arrondissement = Arrondissement::findOrFail(intval($request->arrondissement_id));
        $quartier = Quartier::findOrFail(intval($request->quartier_id));

        $adherant->nom = $request->nom;
        $adherant->prenom = $request->prenom;
        $adherant->sexe = $request->sexe;
        $adherant->telephone = $request->telephone;
        $adherant->type = $request->type;
        $adherant->email = $request->email;
        $adherant->password = $request->password;
        $adherant->ravip = $request->ravip;
        $adherant->profession = $request->profession;
        $adherant->npi = $request->npi;
        $adherant->statut = $request->statut;
        $adherant->photo = $request->photo;
        $adherant->titre_id = $titre->id;
        $adherant->quartier_id = $quartier->id;
        $adherant->departement_id = $departement->id;
        $adherant->arrondissement_id = $arrondissement->id;
        $adherant->commune_id = $commune->id;

        $adherant->save();

        return redirect()->route('adherant.index')->with('success', 'Modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $adherant = User::findOrFail($id);
        $adherant->delete();

        return redirect()->back()->with('success', 'Adhérant ' . $adherant->nom . ' ' . $adherant->prenom . ' a été supprimé avec succès.');
    }
}
