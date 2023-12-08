<?php

namespace App\Http\Controllers\allUsers\BuyerMasters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Facades
use Auth, Cookie, Hash, Mail, Redirect, Carbon;

// Fetch Request Validations

// Fetch Models
use App\Models\User;
use App\Models\Role;
use App\Models\PageMaster;
use App\Models\PageAuthorization;
use App\Models\BuyerContactDetail;
use App\Models\BuyerShippingAddress;

class BuyerMasterController extends Controller
{
    
    /*______________________________________________________________________
        
        # Display Record in list                         
    ______________________________________________________________________*/

    public function list(Request $request){
        $modelObj   = new BuyerContactDetail;
        $queryObj   = $modelObj::where('buyer_status', 'Active');
        if($queryObj->count() > 0){
            $arrDetails     = $queryObj->get()->toArray();
            $data['list']   = $arrDetails; //echo '<pre>'; print_r($arrDetails); die();
        }
        return $data;
    }

    public function listShipping(Request $request){
        $modelObj   = new BuyerShippingAddress;
        $queryObj   = $modelObj::where('shipping_status', 'Active');
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
            'buyer_name'                    => $request->a_buyer_name,
            'buyer_short_name'              => $request->a_buyer_short_name,
            'buyer_address1'                => $request->a_buyer_address1,
            'buyer_address2'                => $request->a_buyer_address2,
            'buyer_state'                   => $request->a_buyer_state,
            'buyer_country'                 => $request->a_buyer_country,
            'buyer_pincode'                 => $request->a_buyer_pinCode,
            'buyer_gstin_no'                => $request->a_buyer_gstin_no,
            'buyer_gstin'                   => $request->a_buyer_gstin,

            'buyer_contact_person_name'     => $request->a_buyer_contact_person_name,
            'buyer_contact_person_email'    => $request->a_buyer_contact_person_email,
            'buyer_contact_person_mobile'   => $request->a_buyer_contact_person_mobile,

            'create_date_time'              => $nowTime,
            'modify_date_time'              => $nowTime,    
            'created_at'                    => $nowTime,    
            'updated_at'                    => $nowTime 
        ];

        $add = BuyerContactDetail::create($insert);

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

            'shipping_contact_person_name'      => $request->a_shipping_contact_person_name,
            'shipping_contact_person_email'     => $request->a_shipping_contact_person_email,
            'shipping_contact_person_mobile'    => $request->a_shipping_contact_person_mobile,

            'create_date_time'                  => $nowTime,
            'modify_date_time'                  => $nowTime,    
            'created_at'                        => $nowTime,    
            'updated_at'                        => $nowTime 
        ];

        $add = BuyerShippingAddress::create($insert);

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
        $record = BuyerContactDetail::find($id); //echo "<pre>"; print_r($record); die();
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
            'buyer_name'                    => $request->a_buyer_name,
            'buyer_short_name'              => $request->a_buyer_short_name,
            'buyer_address1'                => $request->a_buyer_address1,
            'buyer_address2'                => $request->a_buyer_address2,
            'buyer_state'                   => $request->a_buyer_state,
            'buyer_country'                 => $request->a_buyer_country,
            'buyer_pincode'                 => $request->a_buyer_pinCode,
            'buyer_gstin_no'                => $request->a_buyer_gstin_no,
            'buyer_gstin'                   => $request->a_buyer_gstin,

            'buyer_contact_person_name'     => $request->a_buyer_contact_person_name,
            'buyer_contact_person_email'    => $request->a_buyer_contact_person_email,
            'buyer_contact_person_mobile'   => $request->a_buyer_contact_person_mobile,

            'modify_date_time'              => $nowTime,     
            'updated_at'                    => $nowTime 

        ];

        $edit = BuyerContactDetail::where('id', $request->a_sl_no)->update($update);

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
            
        # Delete book in modal                        
    ______________________________________________________________________*/

    public function destroy(Request $request){ 
        $nowTime    = Carbon::now();        
        $update     = [
            'buyer_status' => 'Inactive'
        ];

        $delete = BuyerContactDetail::where('id', $request->a_sl_no)->update($update);

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
