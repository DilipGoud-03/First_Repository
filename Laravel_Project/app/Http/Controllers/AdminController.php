<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Jobs\NewUserWelcomeMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

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
    public function updateUserIndex(Request $request)
    {
        $users = DB::table('users')->where('id', $request->id)->first();
        return view('admin.updateUserIndex', ['users' => $users]);
    }

    function saveUpdate(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:150|unique:users,email,' . $id,
            'password' => 'required|min:5|confirmed',
        ]);

        User::find($request->id)->update($request->all());

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

    public function updateUserRoleIndex(Request $request)
    {
        $users = DB::table('users')->where('id', $request->id)->first();
        return view('admin.updateUserRoleIndex', ['users' => $users]);
    }

    function saveUpdateUserRole(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:150|unique:users,email,' . $id,
            'role' => 'required',
        ]);

        if ($request->role == 1) {
            $role = "Admin";
        } else {
            $role = "User";
        };

        User::find($request->id)->update(['role' => $request->role]);
        $testMailData = [
            'title' => ('Hello ' .  $request->name),
            'body' => ('This is Mail From Profilics Pvt. Limited'),
            'instruction' => ('We are inform you that We have Update your role as :' . $role),
            'useremail' => ('Your Email: ' .  $request->email),
            'userpassword' => ('and your New Password : ***********'),
            'thanksMessage' => ('Congratulations for this possition'),
        ];
        dispatch(new NewUserWelcomeMail($request->email, $testMailData));
        return redirect()->route('userInformationByAdmin')->withSuccess('User role has been changed');
    }
}
