<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        $user = new User;
        $user->email = 'admin@lab-ginjal.com';
        $user->password = bcrypt('1234');
        $user->status = 'Active';
        $user->timestamps;
        $user->save();

        $employee = new Employee;
        $employee->user_id = $user->id;
        $employee->role_id = 1;
        $employee->name = "Admin";
        $employee->address = "Surabaya";
        $employee->phone_number = "0812345566789";
        $employee->timestamps;
        $employee->save();

        $user2 = new User;
        $user2->email = 'laborant@lab-ginjal.com';
        $user2->password = bcrypt('1234');
        $user2->status = 'Active';
        $user2->timestamps;
        $user2->save();

        $employee = new Employee;
        $employee->user_id = $user2->id;
        $employee->role_id = 2;
        $employee->name = "Laborant";
        $employee->address = "Surabaya";
        $employee->phone_number = "081234534189";
        $employee->timestamps;
        $employee->save();
        DB::commit();

        $user3 = new User;
        $user3->email = 'doctor@lab-ginjal.com';
        $user3->password = bcrypt('1234');
        $user3->status = 'Active';
        $user3->timestamps;
        $user3->save();

        $employee = new Employee;
        $employee->user_id = $user3->id;
        $employee->role_id = 3;
        $employee->name = "Doctor";
        $employee->address = "Surabaya";
        $employee->phone_number = "081234534189";
        $employee->timestamps;
        $employee->save();
        DB::commit();
    }

}
