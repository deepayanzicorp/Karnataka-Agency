<?php

namespace App\Http\Controllers\allUsers\SizeMasters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Facades
use Carbon;

// Fetch Models
use App\Models\User;
use App\Models\Role;
use App\Models\PageMaster;
use App\Models\PageAuthorization;
use App\Models\SizeMaster;
use App\Models\LengthMaster;
use App\Models\WidthMaster;
use App\Models\ThicknessMaster;

class SizeMasterController extends Controller
{
    //
     /*______________________________________________________________________
        
        # Display Record in list                         
    ______________________________________________________________________*/

    public function list(Request $request){
        $modelObj   = new SizeMaster;
        $queryObj   = $modelObj::where('size_status', 'Active');
        if($queryObj->count() > 0){
            $arrDetails     = $queryObj->get()->toArray();
            $data['list']   = $arrDetails; //echo '<pre>'; print_r($arrDetails); die();
        }
        return $data;
    }

    // To get length data
    public function listLength(Request $request){
        $modelObj   = new LengthMaster;
        $queryObj   = $modelObj::where('length_status', 'Active');
        if($queryObj->count() > 0){
            $arrDetails         = $queryObj->get()->toArray();
            $data['listLength'] = $arrDetails; 
        }
        return $data;
    }

    // To get width data
    public function listWidth(Request $request){
        $modelObj   = new WidthMaster;
        $queryObj   = $modelObj::where('width_status', 'Active');
        if($queryObj->count() > 0){
            $arrDetails         = $queryObj->get()->toArray();
            $data['listWidth']  = $arrDetails; 
        }
        return $data;
    }

    // To get width data
    public function listThickness(Request $request){
        $modelObj   = new ThicknessMaster;
        $queryObj   = $modelObj::where('thickness_status', 'Active');
        if($queryObj->count() > 0){
            $arrDetails             = $queryObj->get()->toArray();
            $data['listThickness']  = $arrDetails; 
        }
        return $data;
    }

    /*______________________________________________________________________
        
        # Add Record                          
    ______________________________________________________________________*/

    public function insert(Request $request){
        $nowTime    = Carbon::now();
        $insert     = [
            'size_length'       => $request->a_size_length,
            'size_width'        => $request->a_size_width,
            'size_thickness'    => $request->a_size_thickness,
            'size_cat_type'     => $request->a_size_cat_type,
            'size_calculate'    => $request->a_size_calculate,

            'create_date_time'  => $nowTime,
            'modify_date_time'  => $nowTime,    
            'created_at'        => $nowTime,    
            'updated_at'        => $nowTime 
        ];

        $add = SizeMaster::create($insert);

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

    public function calculate(Request $request)
    {
        // Perform your calculation logic here
        $result = $request->input('option1').' X ' . $request->input('option2').' X ' . $request->input('option3');

        // Return the result as JSON
        return response()->json(['result' => $result]);
    }
}
