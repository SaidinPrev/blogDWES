<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Models\Post;
use App\Models\Usuari;

// Route::get('/', function () {
//     return view('welcome');
// });


//Ruta per a l'inici de la pàgina inici
Route::get('/', function(){
    
    return view('inici');
})->name('inici');

//Rutes temporals 



Route::get('/posts/nuevoPrueba', [PostController::class, 'nuevoPrueba'])
    ->name('posts.nuevoPrueba')->middleware('auth');;

Route::get('/posts/editarPrueba/{id}', [PostController::class, 'editarPrueba'])
    ->name('posts.editarPrueba')->middleware('auth');;

Route::get('login', [LoginController::class, 'loginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Rutes de recurs per a posts, registra només les rutes necessàries
Route::resource('posts',PostController::class);

?>

