<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    public function index(){
        $employee = Employee::orderBy("name")->get();

        return view('admin.employee.index',[
            'title' => 'Employee',
            'nvb' => 'employee',
            'employee' => $employee

        ]);
    }

    public function create()
    {
        return view('admin.employee.create',[
            'title' => 'Add Data Employee',
            'nvb' => 'employee'

        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $user = new User;

        $user->email = $request->email;
        $user->status = "Active";
        $user->password = bcrypt($request->password);
        $user->save();

        $employee = new Employee;
        $employee->user_id = $user->id;
        $employee->address = $request->address;
        $employee->phone_number = $request->phone_number;
        $employee->name = $request->user_name;
        $employee->role_id = $request->role;
        $employee->save();

        DB::commit();

        Alert::success('Sukses', $user->employee->name . ' berhasil dibuat');
        return redirect("/employee");
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $employee = Employee::where('user_id',$id)->first();

        return view('admin.employee.edit', [
            'title' => 'Edit Data Employee',
            'nvb' => 'ports',
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
        $user->save();

        $employee = Employee::where('user_id',$request->userID)->first();
        $employee->user_id = $user->id;
        $employee->address = $request->address;
        $employee->phone_number = $request->phone_number;
        $employee->name = $request->user_name;
        $employee->role_id = $request->role;
        $employee->save();

        DB::commit();
        Alert::success('Sukses', $user->employee->name . ' berhasil diperbaharui');

        return redirect('/employee');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $employee = Employee::where('user_id',$id)->first();
        $employee->delete();
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
        Alert::success('Sukses', $user->employee->name . ' berhasil dihapus');
        DB::commit();
        return redirect("/employee");
    }
}
