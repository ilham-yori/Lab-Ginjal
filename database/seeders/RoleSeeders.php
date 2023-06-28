<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        $role = new Role;
        $role->role_name = 'Admin';
        $role->timestamps;
        $role->save();

        $role = new Role;
        $role->role_name = 'Radiographer';
        $role->timestamps;
        $role->save();

        $role = new Role;
        $role->role_name = 'Doctor';
        $role->timestamps;
        $role->save();
        DB::commit();
    }

}
