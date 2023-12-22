<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Jobs\NewUserWelcomeMail;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function userInformation()
    {
        $users = DB::table('users')->get();
        return view('Auth.userInformation', ['users' => $users]);
    }
    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('user.register');
    }
    public function login()
    {
        return view('user.login');
    }

    public function AuthDashboard()
    {
        return view('Auth.dashboard');
    }
    public function dashboard()
    {
        return view('user.dashboard');
    }
    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $request->session()->regenerate();
        return redirect()->route('login')->withSuccess('Your registration has been submitted successfully Please Check Your Gmail');
    }
    function loginUserAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:150|',
            'password' => 'required|min:5|',

        ]);
        // dd($request->email . "  " . $request->password);

        $users = DB::table('users')->where('email', $request->email)->get();

        foreach ($users as $user) {
            $user->Roll_id;
            $user->email;
            $user->name;
        }

        switch ($user->Roll_id) {
            case $user->Roll_id = 0:
                return redirect()->route('dashboard', ['name' => $user->email])->withSuccess('Welcome  ' . $user->name);
                break;
            case $user->Roll_id = 1:
                return redirect()->route('AuthDashboard')->withSuccess('Welcome  ' . $user->name);
                break;
        }
    }
    public function userViewInformation(Request $request)
    {
        $users = DB::table('users')->where('email', $request->email)->get();
        return view('user.userInformation', ['users' => $users]);
    }

    public function logout()
    {
        return redirect()->route('login')->withSuccess('You have Logout Successfully');
    }
}
