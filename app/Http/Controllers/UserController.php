<?php

namespace App\Http\Controllers;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Http\Reques
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    //
    private $user_repo;
    public function __construct(UserInterface $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    // model
    public function model()
    {
        return User::query();
    }

    // index
    public function index(Request $request)
    {    
        	
        $request->input();
        $users= $this->user_repo->index($request);
        
        // $users = $request->all();
        return view('user.index')->with(['users'=> $users]);  
    }

   

    public function create()
    {  
        $newuser = $this->user_repo->create();
        return view('user.create', $newuser);     
    }

    public function send()
    {  
        return view('sample.index');     
    }
    // store 
    public function store(Request $request)
    {
     
        $this->user_repo->store($request);
        return redirect(route('user.index'));  
    }
    
    //  edit
    public function edit($id)
    {
    
        $user  = $this->user_repo->edit($id);    
        return view('user.create',$user);
    }

    // update
   
    // validation
 
    public function getSearch(Request $request){
        
        $users =  $this->user_repo->getSearch($request);           
        // $tbody = view('user.index')->with(['users' => $users])->render();
        // $paginator =  view('partials.layouts.pager', ['paginator' => $users])->render();     
        // $itemCount = $users->total();
     dd($users);
    //    return response()->json(compact('tbody', 'paginator', 'itemCount'));        
    }
}
