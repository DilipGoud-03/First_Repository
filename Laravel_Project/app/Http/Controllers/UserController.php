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
    function saveUpdateUser(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:150|unique:users,email,' . $id,
            'password' => 'required|min:5|confirmed',
        ]);
        // dd($request->id);
        User::find($request->id)->update($request
            ->all());
        $testMailData = [
            'title' => ('Hello ' .  $request->name),
            'body' => ('This is Mail From Profilics Pvt. Limited'),
            'instruction' => ('We are Upadte Your Information for the Security reason'),
            'useremail' => ('Your Email: ' .  $request->email),
            'userpassword' => ('and your New Password : ' .  $request->password),
            'thanksMessage' => ('Thank You for registring our website'),
        ];
        dispatch(new NewUserWelcomeMail($request->email, $testMailData));

        return redirect()->route('login')->with('success', 'User Information has been Updated successfully Please Login again');
    }
}
