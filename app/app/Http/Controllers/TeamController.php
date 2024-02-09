<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends MainController
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:teams',
        ]);

        // Créer l'équipe liée à l'utilisateur actuellement authentifié
        $team = new Team([
            'name' => $request->input('name'),
            // Autres champs liés à l'utilisateur, si nécessaire
            'user_id' => auth()->user()->id,
        ]);

        $team->save();

        return view('dashboard', ['teams' => $team]);
    }
    public function addteam()
    {
        return view('add-team');
    }


}
