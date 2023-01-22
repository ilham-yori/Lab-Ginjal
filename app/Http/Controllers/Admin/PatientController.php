<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PatientController extends Controller
{
    public function index(){
        $patient = Patient::orderBy("name")->get();

        return view('admin.patient.index',[
            'title' => 'Patient',
            'nvb' => 'patient',
            'patient' => $patient

        ]);
    }

    public function create()
    {
        return view('admin.patient.create',[
            'title' => 'Add Data Patient',
            'nvb' => 'patient'

        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $patient = new Patient;

        $patient->name = $request->user_name;
        $patient->address = $request->address;
        $patient->phone_number = $request->phone_number;
        $patient->status = "Active";
        $patient->save();

        DB::commit();

        Alert::success('Sukses', $patient->name . ' berhasil dibuat');
        return redirect("/patient");
    }


    public function edit($id)
    {
        $patient = Patient::findOrFail($id);

        return view('admin.patient.edit', [
            'title' => 'Edit Data Patient',
            'nvb' => 'ports',
            'patient' => $patient
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $patient = Patient::findOrFail($request->userID);

        $patient->name = $request->user_name;
        $patient->status = "Active";
        $patient->address = $request->address;
        $patient->phone_number = $request->phone_number;
        $patient->save();

        DB::commit();
        Alert::success('Sukses', $patient->name . ' berhasil diperbaharui');

        return redirect('/patient');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $patient = Patient::where('user_id',$id)->first();
        $patient->delete();
        Alert::success('Sukses', $patient->name . ' berhasil dihapus');
        DB::commit();
        return redirect("/patient");
    }

    public function modify($id)
    {
        DB::beginTransaction();
        $patient = Patient::findOrFail($id);
        $patient->status = "Deactive";
        $patient->save();
        Alert::success('Sukses', $patient->name . ' berhasil dihapus');
        DB::commit();
        return redirect("/employee");
    }
}
