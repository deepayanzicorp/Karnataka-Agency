<?php

namespace App\Http\Controllers\allUsers\SellerMasters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Facades
use Carbon;

// Fetch Models
use App\Models\User;
use App\Models\Role;
use App\Models\PageMaster;
use App\Models\PageAuthorization;
use App\Models\SellerContactDetail;
use App\Models\SellerShippingAddress;

class SellerMasterController extends Controller
{
    /*______________________________________________________________________
        
        # Display Record in list                         
    ______________________________________________________________________*/

    public function list(Request $request){
        $modelObj   = new SellerContactDetail;
        $queryObj   = $modelObj::where('seller_status', 'Active');
        if($queryObj->count() > 0){
            $arrDetails     = $queryObj->get()->toArray();
            $data['list']   = $arrDetails; //echo '<pre>'; print_r($arrDetails); die();
        }
        return $data;
    }

    public function listShipping(Request $request){
        // Retrieve records based on the row ID
        $rowId = $request->seller_id_shipp;
        $modelObj   = new SellerShippingAddress;
        $queryObj   = $modelObj::where(array('shipping_status' => 'Active', 'seller_id' => $rowId));

        $data = [];

        if($queryObj->count() > 0){
            $arrDetails     = $queryObj->get()->toArray();
            $data['shippinglist']   = $arrDetails; //echo '<pre>'; print_r($arrDetails); die();
        }
        return $data;
    }

    /*______________________________________________________________________
        
        # Add Record                          
    ______________________________________________________________________*/

    public function insert(Request $request){
        $nowTime    = Carbon::now();
        $insert     = [
            'seller_name'                   => $request->a_seller_name,
            'seller_short_name'             => $request->a_seller_short_name,
            'seller_address1'               => $request->a_seller_address1,
            'seller_address2'               => $request->a_seller_address2,
            'seller_state'                  => $request->a_seller_state,
            'seller_country'                => $request->a_seller_country,
            'seller_pincode'                => $request->a_seller_pinCode,
            'seller_gstin_no'               => $request->a_seller_gstin_no,
            'seller_gstin'                  => $request->a_seller_gstin,

            'seller_contact_person_name'    => $request->a_seller_contact_person_name,
            'seller_contact_person_email'   => $request->a_seller_contact_person_email,
            'seller_contact_person_mobile'  => $request->a_seller_contact_person_mobile,

            'create_date_time'              => $nowTime,
            'modify_date_time'              => $nowTime,    
            'created_at'                    => $nowTime,    
            'updated_at'                    => $nowTime 
        ];

        $add = SellerContactDetail::create($insert);

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

    public function insertShipping(Request $request){
        $nowTime    = Carbon::now();

        if(empty($request->a_shipping_address2)){
            $request->a_shipping_address2 = '';
        }

        $insert     = [
            'shipping_short_name'               => $request->a_shipping_short_name,
            'shipping_zone'                     => $request->a_shipping_zone,
            'shipping_short_code'               => $request->a_shipping_short_code,
            'shipping_party_code'               => $request->a_shipping_party_code,
            'shipping_destination'              => $request->a_shipping_destination,
            'shipping_place'                    => $request->a_shipping_place,
            'shipping_address1'                 => $request->a_shipping_address1,
            'shipping_address2'                 => $request->a_shipping_address2,
            'shipping_state'                    => $request->a_shipping_state,
            'seller_id'                         => $request->a_seller_id_shipp,

            'shipping_contact_person_name'      => $request->a_shipping_contact_person_name,
            'shipping_contact_person_email'     => $request->a_shipping_contact_person_email,
            'shipping_contact_person_mobile'    => $request->a_shipping_contact_person_mobile,

            'create_date_time'                  => $nowTime,
            'modify_date_time'                  => $nowTime,    
            'created_at'                        => $nowTime,    
            'updated_at'                        => $nowTime 
        ];

        $add = SellerShippingAddress::create($insert);

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
        $record = SellerContactDetail::find($id); //echo "<pre>"; print_r($record); die();
        return response()->json([
            'status' => 200,
            'record' => $record,
        ]);
    }

    public function editShipping($id){
        $record = SellerShippingAddress::find($id); //echo "<pre>"; print_r($record); die();
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
            'seller_name'                    => $request->a_seller_name,
            'seller_short_name'              => $request->a_seller_short_name,
            'seller_address1'                => $request->a_seller_address1,
            'seller_address2'                => $request->a_seller_address2,
            'seller_state'                   => $request->a_seller_state,
            'seller_country'                 => $request->a_seller_country,
            'seller_pincode'                 => $request->a_seller_pinCode,
            'seller_gstin_no'                => $request->a_seller_gstin_no,
            'seller_gstin'                   => $request->a_seller_gstin,

            'seller_contact_person_name'     => $request->a_seller_contact_person_name,
            'seller_contact_person_email'    => $request->a_seller_contact_person_email,
            'seller_contact_person_mobile'   => $request->a_seller_contact_person_mobile,

            'modify_date_time'              => $nowTime,     
            'updated_at'                    => $nowTime 

        ];

        $edit = SellerContactDetail::where('id', $request->a_sl_no)->update($update);

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

    public function updateShipping(Request $request){
        $nowTime    = Carbon::now();

        if(empty($request->a_shipping_address2)){
            $request->a_shipping_address2 = '';
        }
        
        $update     = [
            'shipping_short_name'               => $request->a_shipping_short_name,
            'shipping_zone'                     => $request->a_shipping_zone,
            'shipping_short_code'               => $request->a_shipping_short_code,
            'shipping_party_code'               => $request->a_shipping_party_code,
            'shipping_destination'              => $request->a_shipping_destination,
            'shipping_place'                    => $request->a_shipping_place,
            'shipping_address1'                 => $request->a_shipping_address1,
            'shipping_address2'                 => $request->a_shipping_address2,
            'shipping_state'                    => $request->a_shipping_state,

            'shipping_contact_person_name'      => $request->a_shipping_contact_person_name,
            'shipping_contact_person_email'     => $request->a_shipping_contact_person_email,
            'shipping_contact_person_mobile'    => $request->a_shipping_contact_person_mobile,

            'modify_date_time'                  => $nowTime,    
            'updated_at'                        => $nowTime  

        ];

        $edit = SellerShippingAddress::where('id', $request->a_sl_no_seller_ship)->update($update);

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
            'seller_status' => 'Inactive'
        ];

        $delete = SellerContactDetail::where('id', $request->a_sl_no)->update($update);

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

    public function destroyShipping(Request $request){ 
        $nowTime    = Carbon::now();        
        $update     = [
            'shipping_status'=> 'Inactive'
        ];

        $delete = SellerShippingAddress::where('id', $request->a_sl_no)->update($update);

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
