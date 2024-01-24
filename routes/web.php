<?php
//importações

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController; //importando controller
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use GuzzleHttp\Middleware;

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

Route::get('/', [EventController::class, 'index']); //utilizando controller e definindo rota
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth'); //middleware para solicita atenticacao para acessar rota
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']); //nome convenção para rota de criar coisas
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
