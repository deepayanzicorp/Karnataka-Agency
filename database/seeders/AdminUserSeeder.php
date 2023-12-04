<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nowTime = Carbon::now();

        User::create([
            'login_id'              => 'Admin',
            'email_id'              => 'deepayan099@gmail.com',
            'mobile_no'             => '1112223334',
            'password'              => '123',
            'full_name'             => 'Admin Olive',
            'role_id'               => 1,
            'user_status'           => 'Active',
            'registration_date'     => $nowTime,
            'last_login_date_time'  => $nowTime,
            'password_reset_code'   => 'admin123',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);
    }
}
