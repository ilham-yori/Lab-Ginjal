<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::check()) {
            if (auth()->user()->employee->role_id == 1) {
                return redirect('/admin');
            }else if (auth()->user()->employee->role_id == 2) {
                return redirect('/laborant');
            }
        }

        return view('doctor.home.index',[
            'title' => 'Dashboard',
            'nvb' => 'home'
        ]);
    }
}
