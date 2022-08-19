<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminToolController extends Controller
{
    //
    public function user_delete($id)
    {
        User::where('id', $id)->firstOrFail()->delete();
        return redirect()->route('admin.user.info');
    }
}
