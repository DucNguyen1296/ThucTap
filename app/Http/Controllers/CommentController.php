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
            $cmt = Comment::create([
                'user_id' => $user->id,
                'post_id' => $post->id,
                'comment' => $comment
            ]);
            // return redirect(route('default'));
            return response()->json($cmt);
        } else {
            
            Session::flash('comment_session', 'Xin vui lòng đăng nhập trước khi bình luận');
            return redirect()->back();
        }
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
        $update_comment = $request->input('update_comment');
        $user = Auth::user();

        Comment::where('id', $id)->update(
            [
                'comment' => $update_comment
            ]
        );

        $cmt = $user->comments->find($id);
        // $cmt = $request->all();
        // dd($cmt);
        return response()->json($cmt);
        // return redirect()->route('default');
    }
}
