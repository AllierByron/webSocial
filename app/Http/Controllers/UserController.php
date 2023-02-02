<?php

namespace App\Http\Controllers;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use League\CommonMark\Node\Block\Document;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $handle = explode("@",$request->input('correo-InS'));
        
        $correo = User::where('email',$request->input('correo-InS'))->first();
        
        //doble verificacion, la comprobacion de la existencia de $correo sirve para evitar un error de SQL
        //que avanza el auto_increment de la tabla users pero no registra ningun nuevo registro/tupla
        if(!$correo){
            $user = User::updateOrCreate(
                [
                    'name' => $handle[0],
                    'estado'=> "Activo",
                    'fecha_nac'=> "0001-01-01",
                    'bool_18' => false,
                    'email'=> $request->input('correo-InS'),
                    'foto_perfil'=> 'https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png',
                    'password' => $request->input('password-InS')
                ]
            );
            
            Auth::login($user);
            
            return redirect()->route('user');
        }else{
            return redirect()->route('user')->with('error', 'Otro usuario tiene el mismo correo');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $userSocialite = Socialite::driver('facebook')->user();
        
    //     $user = User::updateOrCreate(
    //                 [
    //                     'name' => $userSocialite->getName(),
    //                     'estado'=> "Activo",
    //                     'fecha_nac'=> "2009-12-31",
    //                     'bool_18' => false,
    //                     'email'=> $userSocialite->getEmail(),
    //                     'foto_perfil'=> $userSocialite->getAvatar(),
    //                     'password' => '12345'
    //                 ]
    //             );
                
    //     Auth::login($user);
        
    //     return redirect()->route('user');
    // }

    //solo para registrarse con nuestro formulario
    public function store(Request $request)
    {
        $userSocialite = Socialite::driver('facebook')->user();

        // dd($userSocialite);
        if(Auth::check()){
            $user = User::find(auth()->user()->id);
            $user->facebook = $userSocialite->getName();
            $user->save();
            return redirect()->route('user');
        }else{
            return redirect()->route('user')->with('error','Usuario no encontrado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $user = User::where('email', $request->input('correo-InS'))->where('password',$request->input('password-InS'))->first();
        if($user){
            // echo "si existe, ".$user;
            Auth::login($user);
            return redirect()->route('user');
        }else{
            // echo "no existe";
            echo '<script> document.getElementById("apartado-InS").InnerHTML = "Error";</script>';
            return redirect()->route('user')->with('error','Usuario no encontrado');
        }
    }

    public function logout()
    {
        //
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        switch($id){
            case 1:
                
                break;
        }
    }
}
