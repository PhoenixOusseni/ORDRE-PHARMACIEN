<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CotisationController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('administration', [PageController::class, 'admin'])->name('admin');

Route::get('authentification', [PageController::class, 'auth'])->name('authentification');
Route::get('inscription_nouveau_compte', [PageController::class, 'inscription'])->name('inscription');
Route::get('my_account', [PageController::class, 'compte'])->name('compte');
Route::get('mes-cotisations', [PageController::class, 'mescotisations'])->name('mes_cotisations');
Route::get('errors_404', [PageController::class, 'errors'])->name('errors_404');

Route::resource('gestion_membres', UserController::class);
Route::get('membre_actif', [UserController::class, 'membre_actif'])->name('membre_actif');
Route::get('membre_inactif', [UserController::class, 'membre_inactif'])->name('membre_inactif');
Route::post('membre_activation/{id}', [UserController::class, 'activate'])->name('activate');
Route::post('add_profil_image/{id}', [UserController::class, 'profil_image']);
Route::post('update_profil/{id}', [AuthController::class, 'update']);
Route::get('gestion_compte', [UserController::class, 'gest_account'])->name('gestion_compte');
Route::post('change_user_role/{id}', [UserController::class, 'change_role']);

Route::resource('gestion_cotisations', CotisationController::class);
Route::get('Filter/date_filter', [CotisationController::class, 'date_filter'])->name('date_filter');
Route::get('impression/print_cotisation/{id}', [CotisationController::class, 'print']);

Route::post('add_user', [AuthController::class, 'add_user'])->name('register');
Route::post('connexion', [AuthController::class, 'login'])->name('login');
Route::post('deconnexion', [AuthController::class, 'logout'])->name('logout');
