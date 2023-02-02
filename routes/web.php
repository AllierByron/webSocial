<?php

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('/usuario/perfil', 'Usuario/perfil')->name('user');
Route::view('/inicio', 'Usuario/inicio')->name('home');
Route::view('/usuario/amigos', 'Usuario/amigos')->name('friends');
Route::view('/usuario/seguidos', 'Usuario/seguidos')->name('subs');
Route::view('/explorar', 'Exteriores/explorar')->name('expl');


Route::get('/auth/facebook/redirect', function () {
    return Socialite::driver('facebook')->redirect();
});
 
Route::get('/auth/facebook/callback','App\Http\Controllers\UserController@store');
Route::get('/crUsuario','App\Http\Controllers\UserController@create');
Route::post('/isUsuario','App\Http\Controllers\UserController@show');
Route::post('/outUsuario','App\Http\Controllers\UserController@logout');
Route::get('/array',function(){
    $userSocialite = Socialite::driver('facebook')->user();

    dd($userSocialite);
})->name('rutaPrueba');

Route::view('/errorDeIn','layouts/sesion')->name('errorDeIn');
// Route::get('/isUsuario/{id}',function($id){
//     return redirect()->route('App\Http\Controllers\UserController@show')->with('id',$id);

// });
// Route::get('/auth/facebook/callback', function () {
//     $userSocialite = Socialite::driver('facebook')->user();

//     $user = User::updateOrCreate(
//             [
//                 'name' => $userSocialite->getName(),
//                 'estado'=> "Activo",
//                 'fecha_nac'=> "2009-12-31",
//                 'bool_18' => false,
//                 'email'=> $userSocialite->getEmail(),
//                 'password' => '12345'
//             ]
//     );
            
//     Auth::login($user);
    
//     return redirect()->route('user');//->with('id-usuario',$nombre);

//     //return $user->getId();
// });

Route::view('/contactos', 'Exteriores/contactos')->name('cntc');
Route::view('/imagenLocal', 'img/ImgLocal')->name('LRS');
