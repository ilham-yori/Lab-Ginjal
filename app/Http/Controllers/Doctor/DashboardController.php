<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DetectionHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::check()) {
            if (auth()->user()->role_name == "Admin") {
                return redirect('/admin');
            }else if (auth()->user()->role_name == "Radiographer") {
                return redirect('/laborant');
            }
        }

        $detection_history = DetectionHistory::orderBy("created_at","asc")->get();
        $validate_history = DetectionHistory::orderBy("created_at","desc")->where('validation_detection', '!=', 'Unvalidate')->get();
        $unvalidate_history = DetectionHistory::orderBy("created_at","desc")->where('validation_detection', '=', 'Unvalidate')->get();
        $success = DetectionHistory::whereColumn('validation_detection', '=', 'prediction')->get();
        $failed = DetectionHistory::whereColumn('validation_detection', '!=', 'prediction')->where('validation_detection', '!=', 'Unvalidate')->get();

        $year = now()->year;

        $data = DetectionHistory::select(
            DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->pluck('count');

        return view('doctor.home.index',[
            'title' => 'Dashboard',
            'nvb' => 'home',
            'detectionHistory' => $detection_history,
            'validateHistory' => $validate_history,
            'unvalidateHistory' => $unvalidate_history,
            'success' => $success,
            'failed' => $failed,
            'data' => $data
        ]);
    }
}
