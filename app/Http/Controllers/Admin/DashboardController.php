<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::check()) {
            if (auth()->user()->employee->role_id == 1) {
                return redirect('/admin');
            } else if (auth()->user()->employee->role_id == 2) {
                return redirect('/laborant');
            } else if (auth()->user()->employee->role_id == 3) {
                return redirect('/doctor');
            }
        }

        return view('admin.home.index',[
            'title' => 'Dashboard',
            'nvb' => 'home'
        ]);
    }
}
