<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\Comment;
use App\Models\Image;



class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Office::query();

    // تطبيق فلاتر الموقع والنوع
    if ($request->has('location')) {
        $query->where('location', $request->input('location'));
    }

    if ($request->has('subtype')) {
        $query->where('subtype', $request->input('subtype'));
    }

    // تطبيق فلاتر السعر
    if ($request->has('price_from')) {
        $query->where('price', '>=', $request->input('price_from'));
    }

    if ($request->has('price_to')) {
        $query->where('price', '<=', $request->input('price_to'));
    }

    $products = $query->get();

    return view('User.index', compact('products'));
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
        $office = Office::findOrFail($id);
        $comments = Comment::where('office_id', $id)->get();
        $images = Image::where('office_id', $id)->get();

        return view('User.single_office', compact('office', 'comments' ,'images'));    }

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
