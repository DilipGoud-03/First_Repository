<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Jobs\NewUserWelcomeMail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userDashboard()
    {
        return view('user.dashboard');
    }
    public function userViewInformation(Request $request)

    {
        $users = DB::table('users')->where('email', $request->email)->get();
        return view('user.userInformation', ['users' => $users]);
    }
    public function deleteUserByUser(Request $request)
    {
        DB::table('users')->where('id', $request
            ->id)->delete();
        return redirect()->route('login');
    }
    public function update(Request $request)
    {
        $users = DB::table('users')->where('id', $request->id)->first();
        return view('user.updateUser', ['users' => $users]);
    }
    function storeUpdateUser(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:150|unique:users,email,' . $id,
            'password' => 'required|min:5|confirmed',
        ]);

        User::find($request->id)->update($request
            ->all());
        $testMailData = [
            'title' => ('Hello ' .  $request->name),
            'body' => ('This is Mail From Profilics Pvt. Limited'),
            'instruction' => ('You have Upadte Your Information'),
            'useremail' => ('Your Email: ' .  $request->email),
            'userpassword' => ('and your New Password : ' .  $request->password),
            'thanksMessage' => ('Thank You for registring our website'),
        ];
        dispatch(new NewUserWelcomeMail($request->email, $testMailData));
        $request->session()->invalidate();
        return redirect()->route('login')->with('success', 'Your information has been updated successfully, Please login again ');
    }
}
