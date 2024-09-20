<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

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

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Autres pages
Route::get('/formation', function () {
    return view('partials.formation');
})->name('formation');

Route::get('/inscription', function () {
    return view('partials.inscription');
})->name('inscription');

Route::get('/apropos', function () {
    return view('partials.apropos');
})->name('apropos');

Route::get('/blog', function () {
    return view('partials.blog');
})->name('blog');

Route::get('/contact', function () {
    return view('partials.contact');
})->name('contact');

// Routes Utilisater
Route::get('/login', [UsersController::class, 'showCreateForm'])->name('utilisater.create.form');
