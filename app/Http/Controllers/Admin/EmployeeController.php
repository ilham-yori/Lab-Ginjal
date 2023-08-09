<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    public function index(){
        $user = User::orderBy("name")->get();

        return view('admin.employee.index',[
            'title' => 'Employee',
            'nvb' => 'employee',
            'employee' => $user

        ]);
    }

    public function create()
    {
        return view('admin.employee.create',[
            'title' => 'Add Data Employee',
            'nvb' => 'addEmployee'
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $user = new User;

        $user->email = $request->email;
        $user->status = "Active";
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->name = $request->user_name;
        $user->role_name = $request->role;
        $user->save();

        DB::commit();

        Alert::success('Sukses', $user->name . ' berhasil dibuat');
        return redirect("/employee");
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $employee = User::where('id',$id)->first();

        return view('admin.employee.edit', [
            'title' => 'Edit Data Employee',
            'nvb' => 'editEmployee',
            'user' => $user,
            'employee' => $employee
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $user = User::findOrFail($request->userID);

        $user->email = $request->email;
        $user->status = "Active";
        if ($request->password != "") {
            $user->password = bcrypt($request->password);
        }
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->name = $request->user_name;
        $user->role_name = $request->role;
        $user->save();

        DB::commit();
        Alert::success('Sukses', $user->name . ' berhasil diperbaharui');

        return redirect('/employee');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $employee = User::where('id',$id)->first();
        $user = User::findOrFail($id);
        $user->delete();
        Alert::success('Sukses', $employee->name . ' berhasil dihapus');
        DB::commit();
        return redirect("/employee");
    }

    public function modify($id)
    {
        DB::beginTransaction();
        $user = User::findOrFail($id);
        $user->status = "Deactive";
        $user->save();
        Alert::success('Sukses', $user->name . ' berhasil dihapus');
        DB::commit();
        return redirect("/employee");
    }
}
