<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\Eloquent\DataMatchRepository;

class UserController extends Controller
{
    //
    private $users;
    public function __construct()
    {
        $this->users = DataMatchRepository::user();
    }
    public function index(Request $request)
    {
        
        $users = $this->users->index($request);
        return response()->json([
            'message' => 200,
            'users'  => $users ]);  
        // return response()->json($users)->withHeaders([
        //     'Content-type' =>'application/json'
        // ]);     
    }
}
