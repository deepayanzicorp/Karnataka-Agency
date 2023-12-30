<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon;
use App\Models\PageAuthorization;

class PageAuthorizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nowTime = Carbon::now();

        PageAuthorization::create([
            'role_id'           => 1,
            'page_id'           => 1,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 2,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 3,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);
        
        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 4,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 5,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 6,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 7,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 8,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 9,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 10,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 11,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 2,
            'page_id'           => 12,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 3,
            'page_id'           => 4,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 3,
            'page_id'           => 8,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);

        PageAuthorization::create([
            'role_id'           => 3,
            'page_id'           => 9,
            'creator_id'        => 'Admin',
            'create_date_time'  => $nowTime,
            'modifier_id'       => 'Admin',
            'modify_date_time'  => $nowTime,
        ]);
    }
}
