<?php

namespace App\Http\Controllers;

use App\Models\LikePost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikePostController extends Controller
{
    //
    public function like(Request $request, $id)
    {
        $likes = LikePost::all()->where('user_id', Auth::user()->id)->where('post_id', $id)->first();
        if ($likes == null) {
            $like = new LikePost();
            $like->user_id = Auth::user()->id;
            $like->post_id = $id;
            $like->like = 1;
            $like->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $like->save();
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        LikePost::find($id)->delete();
        return redirect()->back();
    }
}
