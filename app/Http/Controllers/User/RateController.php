<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class RateController extends Controller
{
    public function store(Request $request)
    {
        $rate = new Comment();
        $rate->rate = $request->input('rating');
        $rate->office_id = $request->input('office_id');
        
        if (auth()->check()) {
            // المستخدم مسجل دخوله
            $rate->user_id = auth()->user()->id;
        } else {
            // المستخدم غير مسجل دخوله
            $rate->user_id = null;
        }
    
      
    
        $rate->save();
    
        return redirect()->back()->with('success', 'Rating successfully.');
    }}
