<?php

namespace App\Http\Controllers\Lessor;

use App\Http\Controllers\Controller;
use App\Models\Lessor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LessorprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessor = auth()->user(); // Retrieve the authenticated user
        return view('Lessor.profile', compact('lessor'));
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
    $request->validate([
        'name' => '',
        'email' => '',
        'mobile' => '',
        'password' => '',
        'image' => '',
    ]);

    $lessor = User::find($id);

    $lessor->name = $request->name;
    $lessor->email = $request->email;
    $lessor->password =Hash::make ($request->password);
    $lessor->mobile = $request->mobile;
    // $user->image = $request->image;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('image', $imageName);
        $lessor->image = $imageName;
    }

    $lessor->save();

    $lessor = auth()->user(); // Retrieve the authenticated user

    return view('Lessor.profile', compact('lessor'))->with('success', 'Profile updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
