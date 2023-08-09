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
        $user->role_name = "Admin";
        $user->name = "Muhammad Dimas, S.Kom";
        $user->address = "Mojokerto";
        $user->phone_number = "085534823129";
        $user->timestamps;
        $user->save();

        $user2 = new User;
        $user2->email = 'laborant@lab-ginjal.com';
        $user2->password = bcrypt('1234');
        $user2->status = 'Active';
        $user2->timestamps;
        $user2->role_name = "Radiographer";
        $user2->name = "Ali Akbar, A.Rad., S.ST., M.Kes.";
        $user2->address = "Sidoarjo";
        $user2->phone_number = "085334885723";
        $user2->timestamps;
        $user2->save();
        DB::commit();

        $user3 = new User;
        $user3->email = 'doctor@lab-ginjal.com';
        $user3->password = bcrypt('1234');
        $user3->status = 'Active';
        $user3->timestamps;
        $user3->role_name = "Doctor";
        $user3->name = "Dr. Efrilyn Sidabutar, SpPD.";
        $user3->address = "Surabaya";
        $user3->phone_number = "085857211253";
        $user3->timestamps;
        $user3->save();
        DB::commit();
    }

}
