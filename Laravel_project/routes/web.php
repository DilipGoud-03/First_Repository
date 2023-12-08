<?php

use App\Http\Controllers\UserRegistration;
use Illuminate\Support\Facades\Route;

// Route::get('/register', function () {
//     return view('register');
// });

Route::post('/user', [UserRegistration::class, 'newUser']);
