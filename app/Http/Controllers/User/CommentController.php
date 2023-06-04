<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
 // في المسار التحكم المختص بالتعليقات CommentController.php

 public function store(Request $request)
 {
     $comment = new Comment();
     $comment->message = $request->input('message');
     $comment->office_id = $request->input('office_id');
     
     if (auth()->check()) {
         // المستخدم مسجل دخوله
         $comment->user_id = auth()->user()->id;
     } else {
         // المستخدم غير مسجل دخوله
         $comment->user_id = null;
     }
 
     if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move('assit-user\images\comment', $imageName);
        $comment->image = $imageName;
    }
 
     $comment->save();
 
     return redirect()->back()->with('success', 'Comment added successfully.');
 }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // اعرض التفاصيل المرتبطة بتعليق معين
        $comment = Comment::find($id);
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // اعرض النموذج لتعديل تعليق معين
        $comment = Comment::find($id);
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // تحديث بيانات تعليق معين في قاعدة البيانات
        $comment = Comment::find($id);
        $comment->message = $request->input('message');
        $comment->office_id = $request->input('office_id');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('assit-user\images\comment', $imageName);
            $comment->image = $imageName;
        }
    
        $comment->save();
    
        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // حذف تعليق معين من قاعدة البيانات
        $comment = Comment::find($id);
        $comment->delete();
    
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
