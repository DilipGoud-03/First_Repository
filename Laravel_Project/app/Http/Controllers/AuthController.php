<?php

namespace App\Http\Controllers;

use App\Jobs\NewUserWelcomeMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    function register()
    {

        return view('register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:150|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => ($request->email),
            'password' => Hash::make($request->password),
        ]);
        $testMailData = [
            'title' => ('Hello ' .  $request->name),
            'body' => ('This is Mail From Profilics Pvt. Limited'),
            'useremail' => ('Your Email: ' .  $request->email),
            'userpassword' => ('and your Password : ' .  $request->password),
            'thanksMessage' => ('Thank You for registring our website'),
            'instruction' => ('We are remember you, Hope you will remind your password because we can not provide again.')
        ];
        dispatch(new NewUserWelcomeMail($request->email, $testMailData));
        return redirect()->route('login')->withSuccess('Your registration has been submitted successfully Please Check Your Gmail');
    }
    function login()
    {
        if (Auth::user()) {
            return redirect($this->redirectDash());
        }
        return view('login');
    }

    public function loginRequest(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);
        $userCredential = $request->only('email', 'password');

        if (Auth::attempt($userCredential)) {
            if (Auth::user() && Auth::user()->role == 1) {
                $request->session()->regenerate();
                return redirect()->route('adminDashboard')->with('success', 'Welcome Admin');
            } else {
                $request->session()->regenerate();
                return redirect()->route('userDashboard', ['email' => $request->email])->with('success', 'Welcome You are Logged In');
            }
        } else {
            return back()->with('error', 'Username & Password is incorrect');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        Auth::logout();
        return redirect()->route('login')->with('error', 'You have logout successfully');
    }
    function redirectDash()
    {
        if (Auth::user() && Auth::user()->role == 1) {
            $redirect =  route('adminDashboard');
        } else {
            $redirect = route('userDashboard');
        }
        return $redirect;
    }
}
