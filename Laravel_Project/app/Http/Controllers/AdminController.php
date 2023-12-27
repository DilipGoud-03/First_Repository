<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Jobs\NewUserWelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function userInformationByAdmin()
    {
        $users = DB::table('users')->get();
        return view('admin.userInformation', ['users' => $users]);
    }
    public function deleteUserByAdmin(Request $request)
    {
        DB::table('users')->where('id', $request
            ->id)->delete();
        return redirect()->route('userInformationByAdmin')->with('success', 'User has been deleted');
    }
    public function updateUser(Request $request)
    {
        $users = DB::table('users')->where('id', $request->id)->first();
        return view('admin.updateUser', ['users' => $users]);
    }
    function saveUpdate(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:150|unique:users,email,' . $id,
            'password' => 'required|min:5|confirmed',
        ]);

        $User = User::find($request->id);

        $User->update($request
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
        return redirect()->route('userInformationByAdmin')->withSuccess('User Information has been Updated successfully');
    }
}
