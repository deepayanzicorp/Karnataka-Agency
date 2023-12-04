<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Carbon;
use App\Models\PageMaster;

class PageMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nowTime = Carbon::now();

        PageMaster::create([
            'page_name'             => 'Company Details',
            'page_url'              => 'company-details',
            'page_icon'             => 'fa fa-building',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Channel Partner',
            'page_url'              => 'channel-partner',
            'page_icon'             => 'fa fa-users',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Buyer Master',
            'page_url'              => 'buyer-master',
            'page_icon'             => 'fa fa-user-circle',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Seller Master',
            'page_url'              => 'seller-master',
            'page_icon'             => 'fa fa-user-circle',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Grade Master',
            'page_url'              => 'grade-master',
            'page_icon'             => 'fa fa-file',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Item Master',
            'page_url'              => 'item-master',
            'page_icon'             => 'fa fa-shopping-bag',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Distance Master',
            'page_url'              => 'distance-master',
            'page_icon'             => 'fa fa-map',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Item Price List Master',
            'page_url'              => 'item-price-list-master',
            'page_icon'             => 'fa fa-money',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Freight and Other Price List for Agency',
            'page_url'              => 'freight-price-list-master',
            'page_icon'             => 'fa fa-file-text',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);
    }
}
