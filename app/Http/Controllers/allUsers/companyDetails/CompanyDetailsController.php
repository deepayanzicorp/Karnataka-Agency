<?php

namespace App\Http\Controllers\allUsers\companyDetails;

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
use App\Models\CompanyDetails;

class CompanyDetailsController extends Controller
{
    public static $entity = 'allUsers';

    /*______________________________________________________________________
        
        # Display Record in list                         
    ______________________________________________________________________*/

    public function list(Request $request){
        try
        {
            if(!Auth::guard('allUsers')->check()) 
            {
                return Redirect::Route('allUsers.login');
            }
            else
            {
                $userId             = (Auth::guard('allUsers')->id()); //echo '<br> ID'.$userId; die(); 
                $userEmail          = (Auth::guard('allUsers')->user()->email_id);
                $data['entity']     = self::$entity;
                $data['action']     = '';
                $data['page_title'] = 'Company Details';
                
                // Using join method display sidebar data based on user role
                $modelClass         = new User; 
                $query              = $modelClass::where(array('user_status' => 'Active', 'email_id' => $userEmail));
                if($query->count()  > 0){ 
                    $userDetail     = $query->first()->toArray(); 
                    $data['userDetail'] = $userDetail;

                    $roleId         = $userDetail['role_id']; 
                    $arrPageMaster  = Role::select('roles.name', 'page_authorizations.role_id', 'page_authorizations.page_id', 'page_masters.page_name', 'page_masters.page_url', 'page_masters.page_icon')
                                        ->leftJoin('page_authorizations', 'page_authorizations.role_id', '=', 'roles.id')
                                        ->leftJoin('page_masters', 'page_authorizations.page_id', '=', 'page_masters.id')
                                        ->where('roles.id', $roleId)
                                        ->get();
                    $data['arrPageMaster'] = $arrPageMaster;
                }

                
                return view($data['entity'] . '.company-details', $data);
            }
        }
        catch(\Exception $e)             // catch block of the try-catch exception
        {
            $error_message    = $e->getMessage();                       // get error message
            $error_code       = $e->getCode();                          // get error code
            $error_location   = 'Line No. ' . $e->getLine() . ' in file ' . $e->getFile();    // get error line number and file
            $error            = 'Error Code:- ' . $error_code . '| Error Message:- '. $error_message . '| Error Location:- ' . $error_location; //die;
            
            echo $error;
        }
    }

    function get_company_list(){
        //return Employee::all();
        $modelCompanyDetails    = new CompanyDetails;
        $queryCompanyDetails    = $modelCompanyDetails::where('company_status', 'Active');
        if($queryCompanyDetails->count() > 0){
            $arrCompanyDetails  = $queryCompanyDetails->get()->toArray();
            $data['list']           = $arrCompanyDetails; //echo '<pre>'; print_r($arrCompanyDetails); die();
        }
        return $data;
    }
    /*______________________________________________________________________
        
        # Display Record by search in list                         
    ______________________________________________________________________*/

    public function search(Request $request){
        try
        {
            if(!Auth::guard('allUsers')->check()) 
            {
                return Redirect::Route('allUsers.login');
            }
            else
            {
                $query = $request->input('query');
                $modelCompanyDetails = new CompanyDetails;
                $queryCompanyDetails = $modelCompanyDetails->where('company_status', 'Active')
                                        ->where('company_name', 'like', '%' . $query . '%')
                                        ->get();

                if ($queryCompanyDetails->count() > 0) {
                    $arrCompanyDetails = $queryCompanyDetails->toArray();
                    $data['list'] = $arrCompanyDetails;
                }
                return $data;
            }
        }
        catch(\Exception $e)             // catch block of the try-catch exception
        {
            $error_message    = $e->getMessage();                       // get error message
            $error_code       = $e->getCode();                          // get error code
            $error_location   = 'Line No. ' . $e->getLine() . ' in file ' . $e->getFile();    // get error line number and file
            $error            = 'Error Code:- ' . $error_code . '| Error Message:- '. $error_message . '| Error Location:- ' . $error_location; //die;
            
            echo $error;
        }
    }

    /*______________________________________________________________________
        
        # Add Record                          
    ______________________________________________________________________*/

    public function add(Request $request){
        try
        {
            if(!Auth::guard('allUsers')->check()) 
            {
                return Redirect::Route('allUsers.login');
            }
            else
            {
                /*
                // Add part
                $nowTime                    = Carbon::now();
                $newData                    = new CompanyDetails;
                $createdAt                  = Carbon::now()->toDateString(); //echo 'Date: '. $createdAt; die();
                
                $newData->company_name      = $request->input('company_name');
                $newData->company_saccode   = $request->input('sac_code');
                $newData->company_kagstin   = $request->input('ka_gstin_no');
                $newData->company_gstin     = $request->input('gstin_treatment');
                $newData->company_kgssl     = $request->input('kgssl_code');

                $newData->create_date_time  = $nowTime;
                $newData->modify_date_time  = $nowTime;    
                // $newData->created_at        = Carbon::now()->format('Y-m-d');    
                $newData->created_at        = $createdAt;    
                $newData->updated_at        = $nowTime;    //echo '<pre>'; print_r($newData); die(); //$value = $request->members;

                // $newData->save();
                if($newData->save()){
                    return redirect()->back()->with('success', 'Record Added Successfully');
                }else{
                    return redirect()->back()->with('error', 'There is an error while adding Record.');
                }
                */

                $nowTime                    = Carbon::now();

                $insert = [
                    'company' => $request->company,
                    'sac_code' => $request->sac_code,
                    'ka_gstin_no' => $request->ka_gstin_no,
                    'gstin_treatment' => $request->gstin_treatment,
                    'kgssl_code' => $request->kgssl_code
                ];

                $add = CompanyDetails::create($insert);
                if($add){
                    $response = [
                        'status'=>'ok',
                        'success'=>true,
                        'message'=>'Record created succesfully!'
                    ];
                    return $response;
                }else{
                    $response = [
                        'status'=>'ok',
                        'success'=>false,
                        'message'=>'Record created failed!'
                    ];
                    return $response;
                }
            }
        }
        catch(\Exception $e)             // catch block of the try-catch exception
        {
            $error_message    = $e->getMessage();                       // get error message
            $error_code       = $e->getCode();                          // get error code
            $error_location   = 'Line No. ' . $e->getLine() . ' in file ' . $e->getFile();    // get error line number and file
            $error            = 'Error Code:- ' . $error_code . '| Error Message:- '. $error_message . '| Error Location:- ' . $error_location; //die;
            
            echo $error;
        } 
    }

    /*______________________________________________________________________
            
        # Display Record in modal                        
    ______________________________________________________________________*/

    public function edit($id){
        $record = CompanyDetails::find($id); //echo "<pre>"; print_r($record); die();
        return response()->json([
            'status' => 200,
            'record' => $record,
        ]);
    }

    public function insert(Request $request){
        $nowTime                    = Carbon::now();

        $insert = [
            'company_name'      => $request->a_company_name,
            'company_saccode'   => $request->a_company_saccode,
            'company_kagstin'   => $request->a_company_kagstin,
            'company_gstin'     => $request->a_company_gstin,
            'company_kgssl'     => $request->a_company_kgssl,
            'create_date_time'  => $nowTime,
            'modify_date_time'  => $nowTime,    
            'created_at'        => $nowTime,    
            'updated_at'        => $nowTime 
        ];

        $add = CompanyDetails::create($insert);
        if($add){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record created succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record created failed!'
            ];
            return $response;
        }
    }

    /*______________________________________________________________________
            
        # Update Record in modal                        
    ______________________________________________________________________*/

    public function update(Request $request){
        $update = [
            'company_name' => $request->a_company_name,
            'company_saccode' => $request->a_company_saccode,
            'company_kagstin' => $request->a_company_kagstin,
            'company_gstin' => $request->a_company_gstin,
            'company_kgssl' => $request->a_company_kgssl
        ];
        $edit = CompanyDetails::where('id', $request->a_sl_no)->update($update);
        if($edit){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record updated succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record updated failed!'
            ];
            return $response;
        }
    }

    /*______________________________________________________________________
            
        # Delete book in modal                        
    ______________________________________________________________________*/

    /*public function destroy(Request $request){ 
        $nowTime            = Carbon::now();
        $record_id          = $request->input('delete_record_id'); 
        $record               = CompanyDetails::findOrFail($record_id);

        if ($record !== null) {
            $record->deleted_at       = $nowTime; 
            $record->company_status   = 'Inactive';
            $record->update();
            return redirect()->back()->with('success', 'Record has Deleted Successfully');
        } else {
            // Handle the case when the book is not found, e.g., return an error message or redirect with an error message.
            return redirect()->back()->with('error', 'Error happened while deleting.');
        }
    }*/

    public function destroy(Request $request){ 
        $nowTime            = Carbon::now();
        
        $update = [
            // 'company_status' => $request->a_company_status
            'company_status' => 'Inactive'
        ];
        $delete = CompanyDetails::where('id', $request->a_sl_no)->update($update);
        if($delete){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record deleted succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record deleted failed!'
            ];
            return $response;
        }
    }

}
