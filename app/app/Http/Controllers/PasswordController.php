<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Password;

class PasswordController extends MainController
{
    public function getPassword(Request $request)
    {
        $url = $request->input('url');
        $login = $request->input('login');
        $password = $request->input('password');

        $urlVerif = explode('www.', $url)[1] ?? null;

        $loginVerif = explode('@', $login)[1] ?? null;

        if ($loginVerif && $urlVerif) {
            $data = [
                "url" => $url,
                "login" => $login,
                "password" => $password
            ];

            $passwordModel = new Password();
            $passwordModel->site = $data['url'];
            $passwordModel->login = $data['login'];
            $passwordModel->password = $data['password'];
            $passwordModel->user_id = auth()->user()->id;
            $passwordModel->save();

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
            return redirect('/dashboard');
        }
    }

    public function addPassword(Request $request){
        $url = $request->input('url');
        $login = $request->input('login');
        $password = $request->input('password');

        $urlVerif = explode('www.', $url)[1] ?? null;

        $loginVerif = explode('@', $login)[1] ?? null;

        if ($loginVerif && $urlVerif) {
            $data = [
                "url" => $url,
                "login" => $login,
                "password" => $password
            ];

            $passwordModel = new Password();
            $passwordModel->site = $data['url'];
            $passwordModel->login = $data['login'];
            $passwordModel->password = $data['password'];
            $passwordModel->user_id = auth()->user()->id;
            $passwordModel->save();

            $files = Storage::disk('local_json')->files();
            $date = now()->format('YmdHis');

            $filename = "password$date.json";

            Storage::disk('local_json')->put($filename, json_encode($data));

            $jsonData = [];

            // Parcourir chaque fichier JSON et le décoder
            foreach ($files as $file) {
                $contents = Storage::disk('local_json')->get($file);
                $jsonData[] = json_decode($contents, true);
            }

            Session::put('jsonData', $jsonData);
            return redirect('/dashboard');
        }
    
        // Si le formulaire n'a pas encore été envoyé ou s'il y a eu des erreurs de saisi on réaffiche le formulaire
        return view('add-password');
    }

    public function index()
    {
        $userPasswords = DB::table('passwords')->get();

        return view('dashboard', ['passwords' => $passwords]);
    }

    public function showPasswords()
    {
        $passwords = passwords::where('id', auth()->id())->get();
        return view('dashboard', ['passwords' => $passwords]);
    }
}
