<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {

    $busca = request('search'); //método request para resgatar parametros pela url
    //para busca via get (query string/parametros), não precisa de variável na rota

    return view('contact', ['busca' => $busca]);
});

Route::get('/schedule', function () {
    return view('schedule');
});

// Route::get('/{?id}', function($id){
//     return view('coisas',['id' => $id]);
// });