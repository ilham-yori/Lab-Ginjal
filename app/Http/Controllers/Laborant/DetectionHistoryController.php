<?php

namespace App\Http\Controllers\Laborant;

use App\Http\Controllers\Controller;
use App\Models\DetectionHistory;
use App\Models\Patient;
use Illuminate\Http\Request;

class DetectionHistoryController extends Controller
{
    public function index(){
        $detection_history = DetectionHistory::orderBy("created_at","desc")->get();

        return view('laborant.detection.index',[
            'title' => 'Detection History',
            'nvb' => 'detection',
            'detectionHistory' => $detection_history

        ]);
    }

    public function add()
    {
        $patients = Patient::orderBy('name')->get();

        return view('laborant.detection.insert', [
            'title' => 'Detection History',
            'nvb' => 'detection',
            'patients' => $patients
        ]);
    }
}
