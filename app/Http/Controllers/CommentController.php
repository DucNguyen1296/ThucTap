<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    //
    public function comment(Request $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $post = Post::where('id', $id)->first();
            $comment = $request->input('comment');
            Comment::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'comment' => $comment
            ]);
            return redirect(route('default'));
        } else {
            Session::flash('comment_session', 'Xin vui lòng đăng nhập trước khi bình luận');
            return redirect()->back();
        }
    }

    public function comment_delete($id)
    {
        // Storage::delete('public/comment_image/' . $comment->image_name);
        $comment = Comment::where('id', $id);
        $comment->firstOrFail()->delete();
        // dd($comment);
        return response()->json([]);
        // return redirect()->route('default');
    }

    public function comment_update(Request $request, $id)
    {
        $update_comment = $request->input('update_comment');

        $user = Auth::user();
        $comment = Comment::where('id', $id)->first();
        // dd($comment);
        $post = Post::where('id', $comment->post_id)->first();
        Comment::where('id', $id)->update(
            [
                'comment' => $update_comment
            ]
        );
        return redirect()->route('default');
    }
}
