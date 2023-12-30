<?php

namespace App\Http\Controllers\allUsers\ProductCategoryMasters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Facades
use Carbon;

// Fetch Models
use App\Models\User;
use App\Models\Role;
use App\Models\PageMaster;
use App\Models\PageAuthorization;
use App\Models\ProductCategory;

class ProductCategoryMasterController extends Controller
{
    //
    /*______________________________________________________________________
        
        # Display Record in list                         
    ______________________________________________________________________*/

    public function list(Request $request){
        $modelObj       = new ProductCategory;
        $arrDetails     = $modelObj->get()->toArray();
        $data['list']   = $arrDetails; //echo '<pre>'; print_r($arrDetails); die();

       /* $queryObj   = $modelObj::where('seller_status', 'Active');
        if($queryObj->count() > 0){
            $arrDetails     = $queryObj->get()->toArray();
            $data['list']   = $arrDetails; //echo '<pre>'; print_r($arrDetails); die();
        }*/
        return $data;
    }

    /*______________________________________________________________________
        
        # Add Record                          
    ______________________________________________________________________*/

    public function insert(Request $request){
        $nowTime    = Carbon::now();
        $insert     = [
            'product_category_name'     => $request->a_product_category_name,
            'product_category_status'   => $request->a_product_category_status,

            'create_date_time'          => $nowTime,
            'modify_date_time'          => $nowTime,    
            'created_at'                => $nowTime,    
            'updated_at'                => $nowTime 
        ];

        $add = ProductCategory::create($insert);

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

    /*______________________________________________________________________
            
        # Display Record in modal                        
    ______________________________________________________________________*/

    public function edit($id){
        $record = ProductCategory::find($id); //echo "<pre>"; print_r($record); die();
        return response()->json([
            'status' => 200,
            'record' => $record,
        ]);
    }

    /*______________________________________________________________________
            
        # Update Record in modal                        
    ______________________________________________________________________*/

    public function update(Request $request){
        $nowTime    = Carbon::now();
        $update     = [
            'product_category_name'     => $request->a_product_category_name,
            'product_category_status'   => $request->a_product_category_status,

            'modify_date_time'          => $nowTime,     
            'updated_at'                => $nowTime 

        ];

        $edit = ProductCategory::where('id', $request->a_sl_no)->update($update);

        if($edit){
            $response = [
                'status'    => 'ok',
                'success'   => true,
                'message'   => 'Record updated succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'    => 'ok',
                'success'   => false,
                'message'   => 'Record updated failed!'
            ];
            return $response;
        }
    }

    /*______________________________________________________________________
            
        # Delete Record in modal                        
    ______________________________________________________________________*/

    public function destroy(Request $request){ 
        $nowTime    = Carbon::now();        
        $update     = [
            'product_category_status' => 'Inactive'
        ];

        $delete = ProductCategory::where('id', $request->a_sl_no)->update($update);

        if($delete){
            $response = [
                'status'    => 'ok',
                'success'   => true,
                'message'   => 'Record deleted succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'    => 'ok',
                'success'   => false,
                'message'   => 'Record deleted failed!'
            ];
            return $response;
        }
    }
}
