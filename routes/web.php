<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;

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

Route::get('/login', [UsersController::class, 'login'])->name('connexion.login');

Route::post('/connexion', [UsersController::class, 'connexion'])->name('connexion.connexion');

Route::get('/register', function () {
    return 'register';
})-> name('register');

// Route::get('/users', [UsersController::class, 'index'])->name('users.index');

// Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');

// Route::get('/users/{user}', [UsersController::class, 'show'])->name('users.show');

// Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

// Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');

// Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update');

// Route::post('/users', [UsersController::class, 'store'])->name('users.store');


Route::resource('users', UsersController::class);
