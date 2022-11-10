<?php

namespace App\Http\Controllers;

use App\Jobs\UserStatus;
use App\Models\Comment;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    //
    public function comment(Request $request, $id)
    {
        // if (Auth::check()) {
        $user = Auth::user();
        $post = Post::where('id', $id)->first();
        $comment = $request->input('comment');
        $cmt = Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'comment' => $comment,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ]);

        // return redirect(route('default'));
        return response()->json($cmt);
        // } else {

        //     Session::flash('comment_session', 'Xin vui lòng đăng nhập trước khi bình luận');
        //     return redirect()->back();
        // }
    }

    public function comment_delete($id)
    {
        // Storage::delete('public/comment_image/' . $comment->image_name);
        // dd($id);
        $comment = Comment::where('id', $id);
        $comment->firstOrFail()->delete();
        // dd($comment);
        return response()->json([]);
        // return redirect()->route('default');
    }

    public function comment_update(Request $request, $id)
    {
        $update_comment = $request->input('comment');
        // $update_comment = $request->all();

        $user = Auth::user();

        // Comment::where('id', $id)->update(
        //     [
        //         'comment' => $update_comment
        //     ]
        // );

        $comment = Comment::find($id);
        $comment->comment = $update_comment;
        $comment->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $comment->save();

        // $comments = $user->comments->find($id);
        // dd($comments);
        // $cmt = $request->all();
        // dd($cmt);
        return response()->json(['data' => $update_comment]);
        // return redirect()->route('default');
        // return back();
    }
}
