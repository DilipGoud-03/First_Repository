<?php

use App\Http\Controllers\UserRegistration;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('register');
});
Route::post('/user', [UserRegistration::class, 'index']);


Route::get('/hello', function () {
    return view('welcome', ['name' => 'Dilip Goud']);
})->name('welcome');

Route::redirect('/welcome', '/hello');
