<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function getPassword(Request $request)
    {
        $url = $request->input('url');
        $email = $request->input('email');
        $password = $request->input('password');

        $urlVerif = explode('www.', $url)[1] ?? null;

        $emailVerif = explode('@', $email)[1] ?? null;

        if ($emailVerif && $urlVerif) {
            return view('/add-password', ['response' => 'OK']); // Afficher une vue de confirmation
        } else {
            return view('/add-password', ['response' => 'KO']); // Afficher une vue de confirmation
        }
    }
}
