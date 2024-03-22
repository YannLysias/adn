<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function createadminAccount(Request $request)
    {
        $admin = User::where('type', 'Administrateur')->first();

        if($admin)
        {
            return response()->json("L'administrateur avait déja été enregistrer");
        }

        $admin = User::create([
            'nom' => 'KPEDJO',
            'prenom' => 'Guy',
            'sexe' => 'Masculin',
            'telephone' => '0022963053905',
            'email' => 'gkpedjo@gmail.com',
            'type' => 'Administrateur',
            'profession' => 'Informaticien',
            'photo' => 'images.png',
            'npi' => '12324546',
            'ravip' => '1234565',
            'password' => 'original22',
              
        ]);

        return response()->json('Le administrateur a été enregistré avec succès');
    }
    
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
