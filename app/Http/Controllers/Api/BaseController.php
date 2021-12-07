<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $_RESPONSE, $_STATUS;

    protected $success = [
        'message' => 'success'
    ];

    protected $unauthorized = [
        'message' => 'unauthorized'
    ];

    protected $unauthenticated = [
        'message' => 'unauthenticated'
    ];

    protected $empty_data = [
        'message' => 'Data Not Available'
    ];

    protected function resp($data = []) {
        $this->_RESPONSE['data'] = $data;
        return response()->json($this->_RESPONSE, $this->_STATUS);
    }

    protected function response(){
        $this->_RESPONSE = [];
        return $this;
    }

    protected function data($data = []){
        $this->_STATUS = 200;
        return $this->resp($data);
    }

    protected function success(){
        $this->_STATUS = 200;
        return $this->resp();
    }

    protected function unavailable($data = []){
        $this->_STATUS = 401;
        return $this->resp($data);
    }

    protected function unprocessable($data = []){
        $this->_STATUS = 422;
        return $this->resp($data);
    }

    protected function getDate($date){
        if ($date) 
            return Carbon::parse($date);

        return Carbon::now();
    }

//    protected function unauthorized(){
//        throw new UnauthorizedException();
//    }

    // protected function unauthenticated(){
    //     throw new AuthenticationException();
    // }

    // protected function errors($validator, $addition_error = []){
    //     if($addition_error){
    //         list($field, $error) = $addition_error;
    //         $errors = $validator->errors()->add($field, $error);
    //     } else {
    //         $errors = $validator->errors();
    //     }
        
    //     return response()->json([
    //         'errors' => $errors,
    //         'status' => 'error'
    //     ]);
    // }

}
