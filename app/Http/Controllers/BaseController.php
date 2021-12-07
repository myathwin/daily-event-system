<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Auth\AuthenticationException;

class BaseController extends Controller
{
    
    protected $success = [
    	'message' => 'success'
    ];

    protected $unauthorized = [
    	'message' => 'unauthorized'
    ];

    protected $unauthenticated = [
    	'message' => 'unauthenticated'
    ];

    protected $permission_denied = [
    	'message' => 'permission_denied'
    ];

    protected $empty_data = [
    	'message' => 'Data Not Available'
    ];

    protected $role_exists = [
    	'message' => 'User Has Registered With This Role'
    ];

    protected function success()
    {
    	return response()->json($this->success);
    }

    protected function unauthorized()
    {
    	throw new UnauthorizedException();
    }

    protected function unauthenticated()
    {
    	throw new AuthenticationException();
    }

    protected function permission_denied()
    {
    	return response()->json($this->permission_denied, 403);
    	// 403 -> unauthorized user
    }

    protected function empty_data()
    {
    	return response()->json($this->empty_data, 401);
    	// 401 -> could not be authenticated
    }

    protected function role_exists()
    {
    	return response()->json($this->role_exists, 401);
    }

    protected function errors($validator)
    {
    	return response()->json([
    		'errors' => $validator->errors(),
    		'status' => 'error'
    	]);
    }

    protected function errors_message($message)
    {
    	return response()->json([
    		'message' => $message,
    		'status' => 'error'
    	], 401);
    	// 401 -> could not be authenticated
    }


}

