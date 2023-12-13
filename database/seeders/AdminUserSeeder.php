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

        User::create([
            'login_id'              => 'Mrig',
            'email_id'              => 'mrig@gmail.com',
            'mobile_no'             => '1112223334',
            'password'              => '123',
            'full_name'             => 'Mrig Sai',
            'role_id'               => 2,
            'user_status'           => 'Active',
            'registration_date'     => $nowTime,
            'last_login_date_time'  => $nowTime,
            'password_reset_code'   => 'admin123',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        User::create([
            'login_id'              => 'Rahul',
            'email_id'              => 'rahul@gmail.com',
            'mobile_no'             => '1112223334',
            'password'              => '123',
            'full_name'             => 'Rahul Kumar',
            'role_id'               => 2,
            'user_status'           => 'Active',
            'registration_date'     => $nowTime,
            'last_login_date_time'  => $nowTime,
            'password_reset_code'   => 'admin123',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        User::create([
            'login_id'              => 'Rohan',
            'email_id'              => 'rohan@gmail.com',
            'mobile_no'             => '1112223334',
            'password'              => '123',
            'full_name'             => 'Rohan Kumar',
            'role_id'               => 2,
            'user_status'           => 'Active',
            'registration_date'     => $nowTime,
            'last_login_date_time'  => $nowTime,
            'password_reset_code'   => 'admin123',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        User::create([
            'login_id'              => 'Jessica',
            'email_id'              => 'jessica@gmail.com',
            'mobile_no'             => '1112223334',
            'password'              => '123',
            'full_name'             => 'Jessica Smith',
            'role_id'               => 3,
            'user_status'           => 'Active',
            'registration_date'     => $nowTime,
            'last_login_date_time'  => $nowTime,
            'password_reset_code'   => 'admin123',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        User::create([
            'login_id'              => 'Kate',
            'email_id'              => 'kate@gmail.com',
            'mobile_no'             => '1112223334',
            'password'              => '123',
            'full_name'             => 'Kate Winslet',
            'role_id'               => 3,
            'user_status'           => 'Active',
            'registration_date'     => $nowTime,
            'last_login_date_time'  => $nowTime,
            'password_reset_code'   => 'admin123',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        User::create([
            'login_id'              => 'Simpson',
            'email_id'              => 'simpson@gmail.com',
            'mobile_no'             => '1112223334',
            'password'              => '123',
            'full_name'             => 'Simson Williams',
            'role_id'               => 3,
            'user_status'           => 'Active',
            'registration_date'     => $nowTime,
            'last_login_date_time'  => $nowTime,
            'password_reset_code'   => 'admin123',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        User::create([
            'login_id'              => 'Trish',
            'email_id'              => 'trish@gmail.com',
            'mobile_no'             => '1112223334',
            'password'              => '123',
            'full_name'             => 'Trish Stratus',
            'role_id'               => 4,
            'user_status'           => 'Active',
            'registration_date'     => $nowTime,
            'last_login_date_time'  => $nowTime,
            'password_reset_code'   => 'admin123',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        User::create([
            'login_id'              => 'Emmy',
            'email_id'              => 'emmy@gmail.com',
            'mobile_no'             => '1112223334',
            'password'              => '123',
            'full_name'             => 'Emmy Jackson',
            'role_id'               => 4,
            'user_status'           => 'Active',
            'registration_date'     => $nowTime,
            'last_login_date_time'  => $nowTime,
            'password_reset_code'   => 'admin123',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        User::create([
            'login_id'              => 'Corey',
            'email_id'              => 'corey@gmail.com',
            'mobile_no'             => '1112223334',
            'password'              => '123',
            'full_name'             => 'Corey Harrison',
            'role_id'               => 4,
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
