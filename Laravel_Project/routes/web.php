<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
    return view('home');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/store', [AuthController::class, 'store'])->name('store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginRequest', [AuthController::class, 'loginRequest'])->name('loginRequest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['is_admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('adminDashboard');

    Route::get('/deleteUserByAdmin/{id}', [AdminController::class, 'deleteUserByAdmin'])->name('deleteUserByAdmin');
    Route::get('/userInformationByAdmin', [AdminController::class, 'userInformationByAdmin'])->name('userInformationByAdmin');
    Route::get('/updateUser/{id}', [AdminController::class, 'updateUser'])->name('updateUser');
    Route::post('/saveUpdate/{id}', [AdminController::class, 'saveUpdate'])->name('saveUpdate');
});


Route::group(['middleware' => ['is_user']], function () {
    Route::get('/userDashboard', [UserController::class, 'userDashboard'])->name('userDashboard');

    Route::get('/deleteUserByUser/{id}', [UserController::class, 'deleteUserByUser'])->name('deleteUserByUser');
    Route::get('/userViewInformation', [UserController::class, 'userViewInformation'])->name('userInformation');
    Route::get('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::post('/saveUpdateUser/{id}', [UserController::class, 'saveUpdateUser'])->name('saveUpdateUser');
});
