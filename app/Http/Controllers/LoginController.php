<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (auth()->user()->employee->role_id == 1) {
                return redirect('/admin');
            }else if(auth()->user()->employee->role_id == 2){
                return redirect('/laborant');
            }else if (auth()->user()->employee->role_id == 3) {
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
