<?php

namespace App\Http\Requests\AllUsersRequests\LoginValidation;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /*______________________________________________________________________
                                                                       
        create request validation file 
        php artisan make:request AllUsersRequests/LoginValidation/LoginRequest   
    ______________________________________________________________________*/

    /*______________________________________________________________________
                                                                       
        Function to load the validation rules of the request            
        # LoginRequest   
        # To load the validation rules of login request                   
    ______________________________________________________________________*/

    public function rules()
    {
        if ($this->method() == 'POST')
        {
            $ruleCondition  = array(
                                    'email'                 => 'required|email:rfc,dns',
                                    'password'              => 'required',
                                    // 'g-recaptcha-response'  => 'required|captcha'
                                );

            return $ruleCondition;
        }
        else
        {
            return array();
        }
    }

    /*______________________________________________________________________
                                                                       
        Function to load the validation messages of the request            
        # Message   
        # To load the validation messages of a request                    
    ______________________________________________________________________*/

    public function messages()
    {
        if ($this->method() == 'POST')
        {
            return [
                'email.required'                => 'Please, provide email',
                'email.email'                   => 'Please, provide valid email',
                
                'password.required'             => 'Please, provide password',

                'g-recaptcha-response.required' => 'Please verify the reCaptcha.',
                'g-recaptcha-response.captcha'  => 'Captcha error!'
            ];
        }
        else
        {
            return array();
        }
    }
}
