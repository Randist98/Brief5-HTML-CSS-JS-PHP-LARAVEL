<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('signup.signup');
    }
        public function check(Request $request)
        {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $role = $user->role;

                if ($role && $role->name === 'Admin') {

                    session(['role' => 'Admin']);
                    $request->session()->put('user_id', $user);
                    return redirect()->route('admin');

                } elseif ($role && $role->name === 'User') {

                    session(['role' => 'User']);
                    $request->session()->put('user_id', $user);
                    return redirect('home');

                }  elseif ($role && $role->name === 'Lessor') {
                    session(['role' => 'Lessor']);
                    $request->session()->put('user_id', $user->id); // تم استبدال $user بـ $user->id
                    return redirect()->route('lessor');
                }
                
            }

            Session::flash('login-error', 'Invalid email or password');

            return redirect()->back()->withInput($request->only('email'));
        }
}
