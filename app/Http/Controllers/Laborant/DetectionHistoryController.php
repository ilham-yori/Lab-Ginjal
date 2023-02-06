<?php

namespace App\Http\Controllers\Laborant;

use App\Http\Controllers\Controller;
use App\Models\DetectionHistory;
use Illuminate\Http\Request;

class DetectionHistoryController extends Controller
{
    public function index(){
        $detection_history = DetectionHistory::orderBy("created_at","desc")->get();

        return view('laborant.patient.index',[
            'title' => 'Detection History',
            'nvb' => 'detectionHistory',
            'detectionHistory' => $detection_history

        ]);
    }
}
