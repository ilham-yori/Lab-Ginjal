<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DetectionHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ValidationController extends Controller
{
    public function index(){
        $detection_history = DetectionHistory::orderBy("created_at","asc")->where('validation_detection', '=', 'Unvalidate')->get();

        return view('doctor.validation.index',[
            'title' => 'Detection History',
            'nvb' => 'detectHistory',
            'detectionHistory' => $detection_history

        ]);
    }

    public function detail($id)
    {
        $detection_history = DetectionHistory::findOrFail($id);

        return view('doctor.validation.detail', [
            'title' => 'Data Detail Detection',
            'nvb' => 'detail',
            'detectionHistory' => $detection_history
        ]);
    }

    public function validation($id)
    {
        $detection_history = DetectionHistory::findOrFail($id);

        return view('doctor.validation.create', [
            'title' => 'Data Detail Detection',
            'nvb' => 'validate',
            'detectionHistory' => $detection_history
        ]);
    }

    public function recentValidation(){
        $detection_history = DetectionHistory::orderBy("created_at","desc")->where('validation_detection', '!=', 'Unvalidate')->get();

        return view('doctor.validation.index',[
            'title' => 'Recent Validation',
            'nvb' => 'validation',
            'detectionHistory' => $detection_history

        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $detection_history = DetectionHistory::findOrFail($request->patientID);

        $detection_history->doctor_id = auth()->user()->id;
        $detection_history->validation_detection = $request->validation;
        $detection_history->validation_date_detection = Carbon::now();

        $detection_history->save();
        DB::commit();

        Alert::success('Sukses melakukan validasi');
        return redirect("/doctor/history");
    }
}
