<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (auth()->user()->role_name == "Admin") {
                return redirect('/admin');
            }else if(auth()->user()->role_name == "Radiographer"){
                return redirect('/laborant');
            }else if (auth()->user()->role_name == "Doctor") {
                return redirect('/doctor');
            }
        } else {
            return view('auth.login', [
                'title' => 'Login'
            ]);
        }
    }

    public function req(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $status = DB::table('users')->where('email', $request->email)->value('status');

        if ($status == "Active") {
            if (Auth::attempt($data)) {

                $request->session()->regenerate();
                return redirect()->intended('/admin');

            }else{
                return back()->with('loginError', 'Login failed!');
            }
        }
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
