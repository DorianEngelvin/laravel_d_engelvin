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

        $emailVerif = explode('@', $email)[1] ?? null;

        if ($emailVerif) {
            return view('/add-password', ['url' => $url]); // Afficher une vue de confirmation
        }
    }
}
