<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\publication;
use App\Models\User;
use App\Models\forum;
use App\Models\user_forum;
use App\Models\comment;
use Illuminate\Support\Facades\Http;


class controllerPruebas extends Controller
{
    //
    public function fetchUsers(/*$id, Request $req*/){
        // $user = User::where('email', $req->correo)->first();

        // if (!$user || !Hash::check($req->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The provided credentials are incorrect.'],
        //     ]);
        // }
        // $token = $user->createToken('auth_token')->plainTextToken;

        // $user_pubs = Http::withToken('token')->post('http://localhost:8000/api/showUserPubs/1',[
        //     'correo-InS'=> $req->input('correo'),
        //     'password-InS'=>$req->input('password'),
        // ]);

        // dd($user);
        echo 'hola';
    }

}
