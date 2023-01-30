<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/contactos', 'Exteriores/contactos')->name('cntc');
Route::view('/imagenLocal', 'img/ImgLocal')->name('LRS');
