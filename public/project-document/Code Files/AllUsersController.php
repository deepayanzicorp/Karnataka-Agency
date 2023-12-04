<?php

namespace App\Http\Controllers\allUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Http\Requests;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

// Facades
// use Auth, Hash, Mail, Redirect, Carbon;
use Hash, Mail, Redirect, Carbon;

// Fetch Request Validations
use App\Http\Requests\AllUsersRequests\LoginValidation\LoginRequest;

// Fetch Models
use App\Models\User;

class AllUsersController extends Controller
{
    public static $entity = 'allUsers';

    /*______________________________________________________________________
                                                                       
        Function to loging authenticated All Users                          
    ______________________________________________________________________*/
    public function login(LoginRequest $request)
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
                $userDetail = $emailQuery->first()->toArray(); // echo '<pre>';print_r($userDetail); die();

                // General login using auth
                $auth = auth()->guard('allUsers')->attempt(array(
                                                                'email_id'  => $email,          // match email                              
                                                                'password'  => $password ,       // match password
                                                            ));

                if($auth)
                {  
                    // Store additional data in the cookie (for example, user's name)
                    // $userName = Auth::user()->name;
                    $userName = (Auth::guard('allUsers')->user()->email_id);
                    $userMobile = (Auth::guard('allUsers')->user()->mobile_no); //echo '<br>Email: '.$userName.'<br>Mobile: '.$userMobile; die();
                    // $cookieValue = json_encode(['full_name' => $userName]);
                    // $cookieValue = json_encode(array('full_name' => $userName, 'mobile_no' => $userMobile)); echo '<pre>'; print_r($cookieValue); //die();
                    
                    Cookie::queue('user_name', $userName, 60);

                    //return dd( Cookie::get() );
                    // return dd(Cookie::get('user_name'));
                    return dd(Cookie::get());

                    //return dd($_COOKIE['name']);
                    

                    // Cookie will expire in 60 minutes
                    // $minutes = 60;

                    // Set the cookie
                    //$cookie = cookie('user_data', $cookieValue, $minutes);

                   // $userData = json_decode($request->cookie('user_data'), true); echo '<pre> ABCD'; print_r($userData); die();

                    // if authentication is success, get redirected to the dashboard 
                    // return Redirect::Route($data['entity'] . '.dashboard')->with( ['userDetail' => $userDetail] );
                    return Redirect::Route($data['entity'] . '.dashboard')->cookie('name');
                }
                else
                {   
                    // if authentication fails, get redirected to the login page with error message 
                    $request->session()->flash('error','Invalid Password');
                    return Redirect::Route($data['entity'] . '.' . $data['action']);
                }

                // Your login logic here...
               /* if (Auth::attempt(['email_id' => $request->email, 'password' => $request->password])) {
                    // Authentication passed...

                    // Store additional data in the cookie (for example, user's name)
                    $userName = Auth::user()->name;
                    $cookieValue = json_encode(['full_name' => $userName]);

                    // Cookie will expire in 60 minutes
                    $minutes = 60;

                    // Set the cookie
                    $cookie = cookie('user_data', $cookieValue, $minutes);

                    // Attach the cookie to the response
                    // return redirect('/dashboard')->cookie($cookie);
                    return Redirect::Route($data['entity'] . '.dashboard')->cookie($cookie);
                    // return Redirect::Route($data['entity'] . '.dashboard');
                } else {
                    // Authentication failed...
                    // return redirect('/login')->with('error', 'Invalid login credentials');
                    return Redirect::Route($data['entity'] . '.' . $data['action'])->with('error', 'Invalid login credentials');
                }*/

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
                
            }
        }
        // return view('admin.layout.login', $data);
        return view($data['entity'] . '.layout.' . $data['action'], $data);
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
                // $userId             = (Auth::guard('allUsers')->id()); //echo '<br> ID'.$userId; die(); 
                // $userEmail          = (Auth::guard('allUsers')->user()->email_id); 
                $data['entity']     = self::$entity;
                $data['action']     = '';
                $data['page_title'] = 'Dashboard';

                /*$modelClass = new User;  //echo '<br> Email'.$userDetail['email_id']; die();
                $query = $modelClass::where(array('user_status' => 'Active', 'email_id' => $userEmail));

                if($query->count() > 0){ 
                    $userDetail = $query->first()->toArray(); 
                    // echo '<pre>'; print_r($userDetail); die();
                    $data['userDetail'] = $userDetail;
                }*/

                $userData = json_decode($request->cookie('user_data'), true); echo '<pre>'; print_r($userData); die();

                // Check if the cookie exists and contains the expected data
               /* if ($userData && isset($userData['full_name'])) {
                    $userName = $userData['full_name'];
                    return view('allUsers.dashboard', compact('userName'));
                }*/

                if ($userData) {
                    $data['userName'] = $userData['full_name'];
                    $data['userMobile'] = $userData['mobile_no'];
                    return view('allUsers.dashboard', $data);
                    // $userName = $userData['full_name'];
                    // $userMobile = $userData['mobile_no'];
                    // return view('allUsers.dashboard', ['userName' => $userName, 'userMobile' => $userMobile]);
                }

                return view($data['entity'] . '.dashboard', $data);
            }
            // Retrieve the value of the 'user_data' cookie
           /* $userData = json_decode($request->cookie('user_data'), true);

            // Check if the cookie exists and contains the expected data
            if ($userData && isset($userData['full_name'])) {
                $userName = $userData['full_name'];
                return view('allUsers.dashboard', compact('userName'));
            } else {
                // Redirect to login if cookie is not present or data is missing
                // return redirect('/login')->with('error', 'Please log in first');
                return Redirect::Route('allUsers.login')->with('error', 'Please log in first');
            }*/
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
    

}
