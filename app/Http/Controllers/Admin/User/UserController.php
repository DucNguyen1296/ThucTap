<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function user_info()
    {
        $user_data = User::all();
        return view('admin.users.userinfo', ['user' => $user_data]);
    }
}
