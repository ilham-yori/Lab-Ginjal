<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DetectionHistory;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function index(){
        $detection_history = DetectionHistory::orderBy("created_at","asc")->get();

        return view('doctor.detection.index',[
            'title' => 'Detection History',
            'nvb' => 'detectHistory',
            'detectionHistory' => $detection_history

        ]);
    }

    public function detail($id)
    {
        $detection_history = DetectionHistory::findOrFail($id);

        return view('doctor.detection.detail', [
            'title' => 'Data Detail Detection',
            'nvb' => 'detail',
            'detectionHistory' => $detection_history
        ]);
    }
}
