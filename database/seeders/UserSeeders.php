<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->email = 'admin@lab-ginjal.com';
        $user->password = bcrypt('1234');
        $user->status = '1';
        $user->timestamps;
        $user->save();

        $employee = new Employee;
        $employee->user_id = $user->id;
        $employee->role_id = 1;
        $employee->name = "Admin";
        $employee->address = "Surabya";
        $employee->phone_number = "0812345566789";
        $employee->timestamps;
        $employee->save();
    }

}
