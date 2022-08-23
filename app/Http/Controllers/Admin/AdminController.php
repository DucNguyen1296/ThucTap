<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    public function admin_index()
    {
        if (Gate::allows('isAdmin')) {
            $admin_id = Auth::user();
            $admin_data = User::where('id', $admin_id->id)->first();
            Session::flash('admin_index', 'Chào mừng admin !!!');
            return view('/admin.admin', ['admin_data' => $admin_data]);
        } else {
            return back();
        }
    }
}
