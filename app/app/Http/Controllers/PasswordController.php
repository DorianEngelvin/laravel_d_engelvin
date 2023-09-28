<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

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
            $data = [
                "url" => $url,
                "email" => $email,
                "password" => $password
            ];

            $files = Storage::disk('local_json')->files();
            $date = now()->format('YmdHis');

            $filename = "password_$date.json";

            Storage::disk('local_json')->put($filename, json_encode($data));

            $jsonData = [];

            // Parcourir chaque fichier JSON et le décoder
            foreach ($files as $file) {
                $contents = Storage::disk('local_json')->get($file);
                $jsonData[] = json_decode($contents, true);
            }

            Session::put('jsonData', $jsonData);
            return redirect('/page-verif');
        }
    }

}
