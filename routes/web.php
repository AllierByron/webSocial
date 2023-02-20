<?php

use App\Models\User;
use App\Models\forum;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Auth;
use App\Models\publication;
use App\Http\Controllers\ForumController;




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
//la ruta /explorar con el name expl fue remplazada por la siguiente(esta pasa por el controlador y trae datos):
Route::resource('explorar', ForumController::class, ['names'=>['index'=>'expl']]);

Route::get('/usuarioPosts/{id}', 'App\Http\Controllers\PublicationController@show')->name('obtainPosts');

/* las siguientes rutas son para la conexion a google y FB */
Route::get('/auth/facebook/redirect', function () {
    return Socialite::driver('facebook')->redirect();
});
Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/auth/{id}/callback','App\Http\Controllers\UserController@store');
Route::get('/crUsuario/{id}','App\Http\Controllers\UserController@create');
Route::post('/isUsuario/{id}','App\Http\Controllers\UserController@show');
Route::post('/outUsuario','App\Http\Controllers\UserController@logout');
/* temrmino de las rutas para la conexion a google y FB */

Route::view('/publication','layouts/publication')->name('publi');
Route::get('/pub/{title}/{meme}/{subreddit}/{author}/{postlink}',function($title, $meme, $subreddit, $author, $postlink){
    return redirect()->route('publi')
                     ->with('titulo',$title)
                     ->with('meme','https://i.redd.it/'.$meme)
                     ->with('subreddit',$subreddit)
                     ->with('author',$author)
                     ->with('postlink','https://redd.it/'.$postlink);
});

Route::view('/comunidadMemes', 'layouts/comunidadmemes')->name('forumMemes');
Route::view('/comunidad', 'layouts/comunidad')->name('forum');
Route::get('/forum/{id}/{forum_id}', 'App\Http\Controllers\PublicationController@show');

Route::post('/createForum', 'App\Http\Controllers\ForumController@create');
Route::view('/defineForum', 'layouts/createForum')->name('crForo');

Route::post('/createPublication', 'App\Http\Controllers\PublicationController@create');
Route::view('/definePublication', 'layouts/createPublication')->name('crPubli');

// Route::get('/posts/{id}','');

Route::post('/update/{id}','App\Http\Controllers\UserController@update')->name('update');
Route::view('/contactos', 'Exteriores/contactos')->name('cntc');
Route::view('/imagenLocal', 'img/ImgLocal')->name('LRS');
Route::view('/editUserStuff', 'Usuario/editPerfil')->name('editUserStuff');
