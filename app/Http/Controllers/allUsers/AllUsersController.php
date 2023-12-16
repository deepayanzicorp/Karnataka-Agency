<?php

namespace App\Http\Controllers\allUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Facades
use Auth, Cookie, Hash, Mail, Redirect, Carbon;

// Fetch Request Validations
use App\Http\Requests\AllUsersRequests\LoginValidation\LoginRequest;

// Fetch Models
use App\Models\User;
use App\Models\Role;
use App\Models\PageMaster;
use App\Models\PageAuthorization;

class AllUsersController extends Controller
{
    public static $entity = 'allUsers';
    /*______________________________________________________________________
                                                                       
        Function to loging authenticated All Users                          
    ______________________________________________________________________*/
    public function login(LoginRequest $request){
        try
        {
            if(Auth::guard('allUsers')->check()) 
            {
                return Redirect::Route('allUsers.dashboard');
            } 
            else
            {
                $data['entity']             = self::$entity;
                $data['action']             = 'login';

                if($request->isMethod('POST'))
                {
                    $email      = trim($request->email, ' ');
                    $password   = trim($request->password, ' ');

                    $emailQuery = User::where(array('email_id' => $email));
                    if($emailQuery->count() === 0) 
                    {
                        return Redirect::Route($data['entity'] . '.' . $data['action'])->with('error', 'This email is not registered as Admin. Kindly check.');
                    }
                    else
                    {
                        $userDetail = $emailQuery->first()->toArray();  //echo '<pre>';print_r($userDetail); die();

                        

                        /*
                        // Checking user loging on the basis of role_id
                        // Checking User role whether admin
                        if($userDetail['role_id'] === 1){
                            echo 'Admin login'; die();
                        }

                        // Checking User role whether buyer
                        elseif($userDetail['role_id'] === 2){
                            echo 'Buyer login'; die();
                        }

                        // Checking User role whether seller
                        elseif($userDetail['role_id'] === 3){
                            echo 'Seller login'; die();
                        }

                        // Checking User role whether company details
                        elseif($userDetail['role_id'] === 4){
                            echo 'Company Details login'; die();
                        }
                        */

                        
                        // General login using auth
                        $auth = auth()->guard('allUsers')->attempt(array(
                                                                'email_id'  => $email,          // match email                              
                                                                'password'  => $password ,       // match password
                                                            ));
                        
                        if($auth)
                        {  
                            // if authentication is success, get redirected to the dashboard 
                            // return Redirect::Route($data['entity'] . '.dashboard')->with( ['userDetail' => $userDetail] );
                            return Redirect::Route($data['entity'] . '.dashboard');
                        }
                        else
                        {   
                            // if authentication fails, get redirected to the login page with error message 
                            $request->session()->flash('error','Invalid Password');
                            return Redirect::Route($data['entity'] . '.' . $data['action']);
                        }
                        
                    }
                }

                // return view('admin.layout.login', $data);
                return view($data['entity'] . '.layout.' . $data['action'], $data);
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
        
        # Dashboard
        After successful login Admin will see Dashboard                          
    ______________________________________________________________________*/

    public function dashboard(Request $request){
        try
        {
            if(!Auth::guard('allUsers')->check()) 
            {
                return Redirect::Route('allUsers.login');
            }
            else
            {
                // $userDetail          = (Auth::guard('allUsers')->user()); echo '<pre>';print_r($userEmail); die();
                $userId             = (Auth::guard('allUsers')->id()); //echo '<br> ID'.$userId; die(); 
                $userEmail          = (Auth::guard('allUsers')->user()->email_id); 
                $data['entity']     = self::$entity;
                $data['action']     = '';
                $data['page_title'] = 'Dashboard';

                $modelClass         = new User;  //echo '<br> Email'.$userDetail['email_id']; die();
                $query              = $modelClass::where(array('user_status' => 'Active', 'email_id' => $userEmail));

                if($query->count()  > 0){ 
                    $userDetail     = $query->first()->toArray(); 
                    $data['userDetail'] = $userDetail;  // echo '<pre>'; print_r($userDetail); die();

                    // Based on Role Pages will be seen in left sidebar
                    $arrPageMaster = PageMaster::select('page_masters.page_name', 'page_masters.page_url', 'page_masters.page_icon')
                                    ->LEFTJOIN('page_authorizations', 'page_authorizations.page_id', '=', 'page_masters.id')
                                    ->where(array('page_masters.page_status' => 'Active', 'page_authorizations.role_id' => $userDetail['role_id']))
                                    ->get();
                    $data['arrPageMaster'] = $arrPageMaster;  
                }
                return view($data['entity'] . '.dashboard', $data);
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
                                                                       
        # Company Details                          
    ______________________________________________________________________*/
    public function companyDetails(Request $request){
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

                $modelClass         = new User; 
                $query              = $modelClass::where(array('user_status' => 'Active', 'email_id' => $userEmail));

                if($query->count()  > 0){ 
                    $userDetail     = $query->first()->toArray(); 
                    $data['userDetail'] = $userDetail;

                    // Using join method display sidebar data
                    $roleId         = $userDetail['role_id']; 
                    $arrPageMaster  = PageMaster::select('page_masters.page_name', 'page_masters.page_url', 'page_masters.page_icon')
                                    ->LEFTJOIN('page_authorizations', 'page_authorizations.page_id', '=', 'page_masters.id')
                                    ->where(array('page_masters.page_status' => 'Active', 'page_authorizations.role_id' => $roleId))
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

    /*______________________________________________________________________
        
        # AgencyMaster
        After successful login Admin will see AgencyMaster                          
    ______________________________________________________________________*/

    public function channelPartner(Request $request){
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
                $data['page_title'] = 'Channel Partner';

                $modelClass         = new User; 
                $query              = $modelClass::where(array('user_status' => 'Active', 'email_id' => $userEmail));

                if($query->count()  > 0){ 
                    $userDetail     = $query->first()->toArray(); 
                    $data['userDetail'] = $userDetail;

                    // Using join method display sidebar data
                    $roleId         = $userDetail['role_id']; 
                    $arrPageMaster  = Role::select('roles.name', 'page_authorizations.role_id', 'page_authorizations.page_id', 'page_masters.page_name', 'page_masters.page_url', 'page_masters.page_icon')
                                        ->leftJoin('page_authorizations', 'page_authorizations.role_id', '=', 'roles.id')
                                        ->leftJoin('page_masters', 'page_authorizations.page_id', '=', 'page_masters.id')
                                        ->where('roles.id', $roleId)
                                        ->get();
                    $data['arrPageMaster'] = $arrPageMaster;
                }
                return view($data['entity'] . '.channel-partner', $data);
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
        
        # SellerMaster
        After successful login Admin will see SellerMaster                          
    ______________________________________________________________________*/

    public function sellerMaster(Request $request){
        try
        {
            if(!Auth::guard('allUsers')->check()) 
            {
                return Redirect::Route('allUsers.login');
            }
            else
            {
                $userId             = (Auth::guard('allUsers')->id()); 
                $userEmail          = (Auth::guard('allUsers')->user()->email_id);
                $data['entity']     = self::$entity;
                $data['action']     = '';
                $data['page_title'] = 'Seller Master';

                $modelClass         = new User; 
                $query              = $modelClass::where(array('user_status' => 'Active', 'email_id' => $userEmail));

                if($query->count()  > 0){ 
                    $userDetail     = $query->first()->toArray(); 
                    $data['userDetail'] = $userDetail;

                    // Based on Role Pages will be seen in left sidebar
                    $roleId         = $userDetail['role_id']; 
                    $arrPageMaster  = PageMaster::select('page_masters.page_name', 'page_masters.page_url', 'page_masters.page_icon')
                                        ->LEFTJOIN('page_authorizations', 'page_authorizations.page_id', '=', 'page_masters.id')
                                        ->where(array('page_masters.page_status' => 'Active', 'page_authorizations.role_id' => $roleId))
                                        ->get();
                    $data['arrPageMaster'] = $arrPageMaster;
                }
                return view($data['entity'] . '.seller-master', $data);
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
        
        # BuyerMaster
        After successful login Admin will see BuyerMaster                          
    ______________________________________________________________________*/

    public function buyerMaster(Request $request){
        try
        {
            if(!Auth::guard('allUsers')->check()) 
            {
                return Redirect::Route('allUsers.login');
            }
            else
            {
                $userId             = (Auth::guard('allUsers')->id()); 
                $userEmail          = (Auth::guard('allUsers')->user()->email_id);
                $data['entity']     = self::$entity;
                $data['action']     = '';
                $data['page_title'] = 'Buyer Master';

                $modelClass         = new User; 
                $query              = $modelClass::where(array('user_status' => 'Active', 'email_id' => $userEmail));

                if($query->count()  > 0){ 
                    $userDetail     = $query->first()->toArray(); 
                    $data['userDetail'] = $userDetail;

                    // Using join method display sidebar data
                    $roleId         = $userDetail['role_id']; 
                    $arrPageMaster  = Role::select('roles.name', 'page_authorizations.role_id', 'page_authorizations.page_id', 'page_masters.page_name', 'page_masters.page_url', 'page_masters.page_icon')
                                        ->leftJoin('page_authorizations', 'page_authorizations.role_id', '=', 'roles.id')
                                        ->leftJoin('page_masters', 'page_authorizations.page_id', '=', 'page_masters.id')
                                        ->where('roles.id', $roleId)
                                        ->get();
                    $data['arrPageMaster'] = $arrPageMaster;
                }
                return view($data['entity'] . '.buyer-master', $data);
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
        
        # GradeMaster
        After successful login Admin will see GradeMaster                          
    ______________________________________________________________________*/

    public function gradeMaster(Request $request){
        try
        {
            if(!Auth::guard('allUsers')->check()) 
            {
                return Redirect::Route('allUsers.login');
            }
            else
            {
                $userId             = (Auth::guard('allUsers')->id()); 
                $userEmail          = (Auth::guard('allUsers')->user()->email_id);
                $data['entity']     = self::$entity;
                $data['action']     = '';
                $data['page_title'] = 'Grade Master';

                $modelClass         = new User; 
                $query              = $modelClass::where(array('user_status' => 'Active', 'email_id' => $userEmail));

                if($query->count()  > 0){ 
                    $userDetail     = $query->first()->toArray(); 
                    $data['userDetail'] = $userDetail;

                    // Using join method display sidebar data
                    $roleId         = $userDetail['role_id']; 
                    $arrPageMaster  = Role::select('roles.name', 'page_authorizations.role_id', 'page_authorizations.page_id', 'page_masters.page_name', 'page_masters.page_url', 'page_masters.page_icon')
                                        ->leftJoin('page_authorizations', 'page_authorizations.role_id', '=', 'roles.id')
                                        ->leftJoin('page_masters', 'page_authorizations.page_id', '=', 'page_masters.id')
                                        ->where('roles.id', $roleId)
                                        ->get();
                    $data['arrPageMaster'] = $arrPageMaster;
                }
                return view($data['entity'] . '.grade-master', $data);
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
        
        # ItemMaster
        After successful login Admin will see ItemMaster                          
    ______________________________________________________________________*/

    public function itemMaster(Request $request){
        try
        {
            if(!Auth::guard('allUsers')->check()) 
            {
                return Redirect::Route('allUsers.login');
            }
            else
            {
                $userId             = (Auth::guard('allUsers')->id()); 
                $userEmail          = (Auth::guard('allUsers')->user()->email_id);
                $data['entity']     = self::$entity;
                $data['action']     = '';
                $data['page_title'] = 'Item Master';

                $modelClass         = new User; 
                $query              = $modelClass::where(array('user_status' => 'Active', 'email_id' => $userEmail));

                if($query->count()  > 0){ 
                    $userDetail     = $query->first()->toArray(); 
                    $data['userDetail'] = $userDetail;

                    // Using join method display sidebar data
                    $roleId         = $userDetail['role_id']; 
                    $arrPageMaster  = Role::select('roles.name', 'page_authorizations.role_id', 'page_authorizations.page_id', 'page_masters.page_name', 'page_masters.page_url', 'page_masters.page_icon')
                                        ->leftJoin('page_authorizations', 'page_authorizations.role_id', '=', 'roles.id')
                                        ->leftJoin('page_masters', 'page_authorizations.page_id', '=', 'page_masters.id')
                                        ->where('roles.id', $roleId)
                                        ->get();
                    $data['arrPageMaster'] = $arrPageMaster;
                }
                return view($data['entity'] . '.item-master', $data);
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
        
        # DistanceMaster
        After successful login Admin will see DistanceMaster                          
    ______________________________________________________________________*/

    public function distanceMaster(Request $request){
        try
        {
            if(!Auth::guard('allUsers')->check()) 
            {
                return Redirect::Route('allUsers.login');
            }
            else
            {
                $userId             = (Auth::guard('allUsers')->id()); 
                $userEmail          = (Auth::guard('allUsers')->user()->email_id);
                $data['entity']     = self::$entity;
                $data['action']     = '';
                $data['page_title'] = 'Distance Master';

                $modelClass         = new User; 
                $query              = $modelClass::where(array('user_status' => 'Active', 'email_id' => $userEmail));

                if($query->count()  > 0){ 
                    $userDetail     = $query->first()->toArray(); 
                    $data['userDetail'] = $userDetail;

                    // Using join method display sidebar data
                    $roleId         = $userDetail['role_id']; 
                    $arrPageMaster  = Role::select('roles.name', 'page_authorizations.role_id', 'page_authorizations.page_id', 'page_masters.page_name', 'page_masters.page_url', 'page_masters.page_icon')
                                        ->leftJoin('page_authorizations', 'page_authorizations.role_id', '=', 'roles.id')
                                        ->leftJoin('page_masters', 'page_authorizations.page_id', '=', 'page_masters.id')
                                        ->where('roles.id', $roleId)
                                        ->get();
                    $data['arrPageMaster'] = $arrPageMaster;
                }
                return view($data['entity'] . '.distance-master', $data);
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
        
        # LogOut
        After successful logout Admin will return to Login page                          
    ______________________________________________________________________*/

    public function logout()
    {
        Auth::guard('allUsers')->logout();
        return Redirect::Route('allUsers.login');
    }
}
