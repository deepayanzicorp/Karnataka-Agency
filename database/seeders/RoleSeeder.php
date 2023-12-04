<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Current Time
        $nowTime = Carbon::now();

        Role::create([
            'name'              => 'Admin',
            'status'            => 'Active',
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        Role::create([
            'name'              => 'Buyer',
            'status'            => 'Active',
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        Role::create([
            'name'              => 'Seller',
            'status'            => 'Active',
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        Role::create([
            'name'              => 'Company Details',
            'status'            => 'Active',
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);
    }
}
