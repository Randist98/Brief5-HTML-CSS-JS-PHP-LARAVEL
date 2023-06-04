<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;



class DashboardAdminController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Retrieve the authenticated user
        return view('Admin.profile', compact('user'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =Hash::make ($request->password);
        $user->mobile = $request->mobile;
        // $user->image = $request->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('image', $imageName);
            $user->image = $imageName;
        }

        $user->save();

        return view('Admin.profile', compact('user'));
    }
}
