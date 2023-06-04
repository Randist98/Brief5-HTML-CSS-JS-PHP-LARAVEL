<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class SignuplessorController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name2' => 'required',
            'email2' => 'required|email|unique:users,email',
            'password2' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user record
        $user = User::create([
            'name' => $request->input('name2'),
            'email' => $request->input('email2'),
            'password' => Hash::make($request->input('password2')),
            'role_id' => 3,
            'mobile' => 'null',
        ]);

        // Clear login form validation errors
        $request->session()->forget('errors');

        // Flash the success message
        session()->flash('signup-success', 'Register done successfully. You can now login.');

        return view('lessor.index');
    }

}
