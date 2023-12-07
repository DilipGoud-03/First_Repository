<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class UserRegistration extends Controller
{
    public function newUser(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        if ($name && $email) {
            echo 'Name: ' . $name;
            echo '<br>';
            echo 'Email: ' . $email;
            echo '<br>';
        } else {
            echo "You have unfill on those one field";
        }
        return view('register');
    }
}
