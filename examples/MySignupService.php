<?php

use Gills\FilterBatch;
use Gills\FilterException;

/**
 * File for Signup Service
 */

/**
 * Class for Signup Service
 */
class MySignupService
{

    /**
     * Respond to service call
     * @param MySignupServiceInputs $inputs
     */
    protected function respond (MySignupServiceInputs $inputs)
    {
        try {
            $this->filterInputs($inputs);

            //now, do something with filtered inputs

        } catch (FilterException $fex) {
            
        } catch (\Exception $ex) {
            
        }
    }

    function getPdo()
    {
        //TODO: connect to a db
        $pdo = new PDO($dsn, $username, $passwd, $options);

        return $pdo;
    }

    protected function filterInputs(MySignupServiceInputs $inputs)
    {
        $rules = $this->getRules();

        $data = (array) $inputs;
        
        foreach ($rules as $field => $filters) {
            
            if (! array_key_exists($field, $data)) continue;//skip

            try {
                $inputs->$field = FilterBatch::apply($inputs->$field, $filters);
            } catch (FilterException $fex) {
                $fex->input_name = $field;
                throw $fex;
            }
        }
    }
    
    /**
     * Based on the inputs collected we can have dynamic array of rules
     * @return array
     */
    protected function getRules()
    {
        $rules = [
            'first_name' => [
                ['required',    'First name is required'], ['string'], ['trim'],
                ['string-size', 'First name must be between 2 and 50 characters', [2, 50]],
            ],
            'last_name' => [
                ['required',    'Last name is required'], ['string'], ['trim'],
                ['string-size', 'Last name must be between 2 and 50 characters', [2, 50]],
            ],
            'email' => [
                ['required', 'Email is required'],
                ['string'],
                ['trim'],
                ['lower-case'],
                ['string-size', 'Email address must be less than 100 characters', [0, 100]],
                ['email',       'Enter a valid email address'],
                ['pdo-unique',  'Email address is already registered', [$this->getPdo(), 'users', 'email = ?']],
                ['pdo-unique',  'Email address is already registered', [$this->getPdo(), 'users', 'paypal = ?']],
            ],
            'password' => [
                ['required',      'A strong password is required'],
                ['safe-password', 'A strong password is required'],
            ],
            'gender' => [
                ['in', 'Gender is required', [0, 1, '0', '1']]
            ],
            'dob' => [
                ['required', 'Date of birth is required'],
                ['date', 'Date of birth must be a valid date'],
            ],
            'country_id' => [
                ['required',     'Country is required'],
                ['int'],
                ['number-range', 'Country is required', [1, 250]], // good enough range to be a valid country ID
            ],
        ];

        return $rules;
    }

    

}