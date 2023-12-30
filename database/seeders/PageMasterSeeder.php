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
            'page_name'             => 'Buyer',
            'page_url'              => 'buyer',
            'page_icon'             => 'fa fa-user-circle',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Seller',
            'page_url'              => 'seller',
            'page_icon'             => 'fa fa-user-circle',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Grade',
            'page_url'              => 'grade',
            'page_icon'             => 'fa fa-file',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Product Category',
            'page_url'              => 'product-category',
            'page_icon'             => 'fa fa-bars',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Item',
            'page_url'              => 'item',
            'page_icon'             => 'fa fa-shopping-bag',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Tax',
            'page_url'              => 'tax',
            'page_icon'             => 'fa fa-money',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Plant',
            'page_url'              => 'plant',
            'page_icon'             => 'fa fa-industry',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Distance',
            'page_url'              => 'distance',
            'page_icon'             => 'fa fa-map',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Item Price List',
            'page_url'              => 'item-price-list',
            'page_icon'             => 'fa fa-money',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);

        PageMaster::create([
            'page_name'             => 'Freight and Other Price List for Agency',
            'page_url'              => 'freight-price-list',
            'page_icon'             => 'fa fa-file-text',
            'page_status'           => 'Active',
            'creator_id'            => 'Admin',
            'create_date_time'      => $nowTime,
            'modifier_id'           => 'Admin',
            'modify_date_time'      => $nowTime,
        ]);
    }
}
