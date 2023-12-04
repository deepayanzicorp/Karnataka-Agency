<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Facades
use Auth, Hash, Mail, Redirect, Carbon;

// Fetch Request Validations
// use App\Http\Requests\AllUsersRequests\LoginValidation\LoginRequest;

// Fetch Models
use App\Models\User;

class AdminController extends Controller
{
    //
    public static $entity = 'admin';
    /*______________________________________________________________________
                                                                       
        # Company Details                          
    ______________________________________________________________________*/
   /* public function companyDetails(Request $request){
        try
        {
            if(!Auth::guard('admin')->check()) 
            {
                return Redirect::Route('allUsers.login');
            }
            else
            {
                $data['entity']     = self::$entity;
                $data['action']     = '';
                $data['page_title'] = 'Company Details';

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
    */
}
