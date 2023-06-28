<?php

namespace App\Http\Controllers\Laborant;

use App\Http\Controllers\Controller;
use App\Models\DetectionHistory;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DetectionHistoryController extends Controller
{
    public function index(){
        $detection_history = DetectionHistory::orderBy("created_at","asc")->where('validation_detection', '=', 'Unvalidate')->get();

        return view('laborant.detection.index',[
            'title' => 'Unvalidate Detection',
            'nvb' => 'unvalidateDetection',
            'detectionHistory' => $detection_history

        ]);
    }

    public function history(){
        $detection_history = DetectionHistory::orderBy("created_at","asc")->get();

        return view('laborant.detection.history',[
            'title' => 'Detection',
            'nvb' => 'detectionHistory',
            'detectionHistory' => $detection_history

        ]);
    }

    public function create()
    {
        $patients = Patient::orderBy('name')->get();

        return view('laborant.detection.create', [
            'title' => 'Add Detection Data',
            'nvb' => 'detection',
            'patients' => $patients
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'patient' => ['required'],
            'prediction' => ['required'],
            'img' => 'required|image|mimes:jpeg,png,jpg|max:20048'
        ]);

        $detection_history = new DetectionHistory;

        $detection_history->patient_id = $request->patient;
        $detection_history->date_detection = date_create();
        $detection_history->prediction = $request->prediction;
        $detection_history->validation_detection = 'Unvalidate';
        $detection_history->laborant_id = auth()->user()->id;

        $img = $request->file('img')->store('uploads', 'public');
        $detection_history->image = $img;
        $detection_history->save();
        DB::commit();

        Alert::success('Sukses melakukan deteksi');
        return redirect("/laborant/history");
    }

    public function detail($id)
    {
        $detection_history = DetectionHistory::findOrFail($id);

        return view('laborant.detection.detail', [
            'title' => 'Data Detail Detection',
            'nvb' => 'detail',
            'detectionHistory' => $detection_history
        ]);
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $detection_history = DetectionHistory::where('id',$id)->first();
        $detection_history->delete();
        Alert::success('Sukses menghapus riwayat deteksi');
        DB::commit();
        return redirect("/laborant/history");
    }


}
