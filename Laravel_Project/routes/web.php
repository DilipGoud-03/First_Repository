<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Controller;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/oneToOneRelationship', [Controller::class, 'oneToOne']);

// Route::get('/oneToManyRelationship', [Controller::class, 'oneToOne']);

Route::get('/AuthDashboard', [LoginRegisterController::class, 'AuthDashboard'])->name('AuthDashboard');

Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');

Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');

Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');

Route::post('/loginUserAdmin', [LoginRegisterController::class, 'loginUserAdmin'])->name('loginUserAdmin');

Route::get('/dashboard', [LoginRegisterController::class, 'dashboard'])->name('dashboard');

Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

Route::get('/userViewInformation', [LoginRegisterController::class, 'userViewInformation'])->name('userViewInformation');

Route::get('/userInformation', [LoginRegisterController::class, 'userInformation'])->name('userInformation');
