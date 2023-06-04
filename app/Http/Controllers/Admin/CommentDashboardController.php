<?php

namespace App\Http\Controllers\Admin;
use App\Models\Comment;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentDashboardController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(3);
        // $users = User::paginate(3);
    



        return view('Admin.comments.index', compact('comments'));
    }

    public function show($id)
    {
        $comment = comment::findOrFail($id);
        $user = User::findOrFail($comment->user_id); // Assuming the user_id is stored in the review model

        return view('admin.Comments.show', compact('comment', 'user'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('commentdashboard.index')->with('success', 'Comment deleted successfully');
    }
}
