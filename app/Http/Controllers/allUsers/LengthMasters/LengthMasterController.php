<?php

namespace App\Http\Controllers\allUsers\LengthMasters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Facades
use Carbon;

// Fetch Models
use App\Models\User;
use App\Models\Role;
use App\Models\PageMaster;
use App\Models\PageAuthorization;
use App\Models\LengthMaster;

class LengthMasterController extends Controller
{
    //
    /*______________________________________________________________________
        
        # Display Record in list                         
    ______________________________________________________________________*/

    public function list(Request $request){
        $modelObj   = new LengthMaster;
        $queryObj   = $modelObj::where('width_status', 'Active');
        if($queryObj->count() > 0){
            $arrDetails     = $queryObj->get()->toArray();
            $data['list']   = $arrDetails; //echo '<pre>'; print_r($arrDetails); die();
        }
        return $data;
    }

    /*______________________________________________________________________
        
        # Add Record                          
    ______________________________________________________________________*/

    public function insert(Request $request){
        $nowTime    = Carbon::now();
        $insert     = [
            ''             => $request->a_,

            'create_date_time'  => $nowTime,
            'modify_date_time'  => $nowTime,    
            'created_at'        => $nowTime,    
            'updated_at'        => $nowTime 
        ];

        $add = LengthMaster::create($insert);

        if($add){
            $response = [
                'status'    => 'ok',
                'success'   => true,
                'message'   => 'Record created succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'    => 'ok',
                'success'   => false,
                'message'   => 'Record created failed!'
            ];
            return $response;
        }
    }
}
