<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon;
use App\Models\User;

class AllUsersSeeder extends Seeder
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
            'login_id'              => 'Mrig',
            'email_id'              => 'mrig@gmail.com',
            'mobile_no'             => '9830123456',
            'password'              => '123',
            'full_name'             => 'Mrig Sai',
            'role_id'               => 2,
            'user_status'           => 'Active',
            'registration_date'     => $nowTime,
            'last_login_date_time'  => $nowTime,
            'password_reset_code'   => 'mrig123',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);
    }
}
