<?php

namespace App\Http\Controllers\Laborant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('laborant.home.index',[
            'title' => 'Dashboard',
            'nvb' => 'home'
        ]);
    }
}
