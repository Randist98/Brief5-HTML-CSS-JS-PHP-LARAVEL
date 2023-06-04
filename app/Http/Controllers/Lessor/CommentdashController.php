<?php

namespace App\Http\Controllers\Lessor;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Office;
use Illuminate\Support\Facades\Auth;

class CommentdashController extends Controller
{

    public function showUserComments()
    {
        $user = Auth::user();
        $offices = Office::where('user_id', $user->id)->get();
    
        $comments = collect();
    
        if ($offices) {
            foreach ($offices as $office) {
                $officeComments = Comment::where('office_id', $office->id)->get();
                $comments = $comments->concat($officeComments); // دمج التعليقات في مجموعة التعليقات
            }
        }
    
        return view('Lessor.comment.index', compact('comments'));
    }
    
    

    

// public function showComments()
// {
//     $userId = auth()->user()->id;
//     return $this->showUserComments($userId);
// }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
