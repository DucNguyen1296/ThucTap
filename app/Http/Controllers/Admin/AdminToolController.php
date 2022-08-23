<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminToolController extends Controller
{
    //
    public function user_delete($id)
    {
        // $user = User::where('id', $id)->first();
        // if ($user->role == 'admin') {
        //     return back();
        // }
        User::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('admin.user.info');
    }

    public function user_edit_index($id)
    {

        $user = User::where('id', $id)->first();
        // dd($user);
        return view('/admin.users.userdetail', ['user' => $user]);
    }

    public function user_edit(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $date = $request->input('date');
        $location = $request->input('location');
        $title = $request->input('title');

        User::where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'date' => $date,
            'location' => $location,
            'title' => $title
        ]);
        return redirect()->route('admin.user.info');
    }
}
