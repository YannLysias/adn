<?php

namespace App\Http\Controllers;

use App\Models\Arrondissement;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\Titre;
use App\Models\Quartier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InscrireController extends Controller
{

    public function filter(Request $request)
    {
        if ($request->has('departement_id')) {
            $usersQuery = User::query();

            if (auth()->user()->type === 'Coordonnateur') {
                $usersQuery->whereNotIn('type', ['Coordonnateur', 'Administrateur']);
            }

            $usersQuery->where('departement_id', intval($request->query('departement_id')));

            // if ($request->has('commune_id')) {
            //     $usersQuery->where('commune_id', intval($request->query('commune_id')));
            // }

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

        return view('inscrire', [
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
            //'email' => 'email|unique:users,email|max:255',
            //'ravip' => 'required|max:255',
            'profession' => 'required|max:255',
            'statut'    => 'required|max:255',
            //'npi' => 'required|max:255',
            //'photo' => 'mimes:jpg,png,jpeg',
            'quartier_id' => 'required|max:255',
            'arrondissement_id' => 'required|max:255',
            'departement_id' => 'required|max:255',
            'commune_id' => 'required|max:255',


        ]);



        $departement = Departement::findOrFail(intval($request->departement_id));
        $commune = Commune::findOrFail(intval($request->commune_id));
        $quartier = Quartier::findOrFail(intval($request->quartier_id));
        $arrondissement = Arrondissement::findOrFail(intval($request->arrondissement_id));


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
            'npi' => $request->npi,
            'photo' => 'Null',
            'departement_id' => $departement->id,
            'commune_id' => $commune->id,
            'arrondissement_id' => $arrondissement->id,
            'quartier_id' => $quartier->id,


        ]);

        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
