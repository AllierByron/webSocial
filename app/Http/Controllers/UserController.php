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
    public function create(Request $request, $id)
    {
        //
        switch ($id) {
            case 1:
                $handle = explode("@",$request->input('correo-InS'));
        
                $correo = User::where('email',$request->input('correo-InS'))->first();
                
                //doble verificacion, la comprobacion de la existencia de $correo sirve para evitar un error de SQL
                //que avanza el auto_increment de la tabla users pero no registra ningun nuevo registro/tupla
                //el metodo updateOrCreate simplemente verifica que no este creado el mismo usuario con la misma contraseña
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
                    return redirect()->route('user')->with('error', 'Ya existe una cuenta con ese correo');
                }
                break;
            case 2:
                $userSocialite = Socialite::driver('google')->user();

                $correo = User::where('email', $userSocialite->getEmail())->first();

                if(!$correo){
                    // dd($userSocialite);
                    $user = User::updateOrCreate(   
                        [
                            'name' => $userSocialite->getName(),
                            'estado'=> "Activo",
                            'fecha_nac'=> "0001-01-01",
                            'bool_18' => false,
                            'email'=> $userSocialite->getEmail(),
                            'foto_perfil'=> $userSocialite->getAvatar()
                        ]
                    );
                    
                    Auth::login($user);
                
                    return redirect()->route('user');

                }else{
                    return UserController::show($request,2);
                    //return redirect()->route('user')->with('error', 'Ya existe una cuenta con ese correo');
                }
                
                break;
            default:
                return "error";
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Añadido de FB
    public function store(Request $request,$id)
    {
        switch ($id) {
            case 'facebook':
                $userSocialite = Socialite::driver('facebook')->user();

                // dd($userSocialite);
                if(Auth::check()){
                    $user = User::find(auth()->user()->id);
                    $user->facebook = "https://www.facebook.com/search/people/?q=".$userSocialite->getName();
                    $user->save();
                    return redirect()->route('user');
                }else{
                    return redirect()->route('user')->with('error','Usuario no encontrado');
                }
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        switch ($id) {
            //caso 1 para usuarios que ingresaron manualmente su correo y contraseña
            case 1:

                $user = User::where('email', $request->input('correo-InS'))
                            ->where('password',$request->input('password-InS'))
                            ->where('estado','Activo')->first();
                if($user){
                    // echo "si existe, ".$user;
                    Auth::login($user);
                    return redirect()->route('user');
                }else{
                    // echo "no existe";
                    echo '<script> document.getElementById("apartado-InS").InnerHTML = "Error";</script>';
                    return redirect()->route('home')->with('error','Usuario no encontrado');
                }

                break;
            //caso 2 para usuarios que crearon su cuenta mediante google, no hay contraseña regsitrada, solo correo
            case 2:
                $userSocialite = Socialite::driver('google')->user();

                $user = User::where('email', $userSocialite->getEmail())
                            ->where('estado','Activo')->first();

                if($user){
                    // echo "si existe, ".$user;
                    Auth::login($user);
                    return redirect()->route('user');
                }else{
                    // echo "no existe";
                    echo '<script> document.getElementById("apartado-InS").InnerHTML = "Error";</script>';
                    return redirect()->route('user')->with('error','Usuario no encontrado');
                }

                break;
            default:
                # code...
                break;
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
        switch($id){
            //actualizar aspectos del perfil
            case 1:
                $foto_perfil = "";

                if($request->input('avatar') != ""){
                    $foto_perfil = $request->input('avatar');
                }else if($request->input('img-elegida') != ""){
                    $foto_perfil = $request->input('img-elegida');
                }else{
                    $foto_perfil = auth()->user()->foto_perfil;
                }

                User::where('email',auth()->user()->email)
                      ->update(array('name'=> $request->input('name'),
                                     'facebook'=> $request->input('urlFB'),
                                     'foto_perfil'=> $foto_perfil));
                return redirect()->route('home');

            case 2:
                break;
            default:
                breaK;
        }
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
