<?php

namespace App\Repository\Eloquent;

use Carbon\Carbon;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Interfaces\UserInterface;
use App\Repository\Eloquent\DataRepo;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Access\Authorizable;

class UserRepository extends BaseRepository implements UserInterface
{
    
     public function __construct(User $model)
    {
        parent::__construct($model);
     
    }

    public function model(){
        return User::query();
    }
    public function index($request)
    {
       
        if($request->keyword){
            $users = $this->Search($request);
            return $users; 
        }       
          else{
            $users = $this->model()->orderBy('id', 'asc')->get();
            return $users; 
          }
          
      
    }
    public function Search($request)
    {
        if($request->keyword){
            $keyword = $request->keyword;   
             $users = $this->model()
                        ->select('users.id','users.name','users.email')
                        ->where('name', '=', $keyword)
                        ->orWhere('email', '=', $keyword)
                        ->orWhere('deparment', '=', $keyword)
                        ->orWhere('position', '=', $keyword)
                        ->orderBy('id', 'desc')
                    ->paginate(10);
                    dd(  $users);
                    return $users;   
    }

}
    public function create()
    {
        $newuser = new User(); 
                       
        return array_merge(['user' => $newuser ]);
        // return view('user.create');
    }
    public function send()
    {
      
        return view('sample.index');
    }
    public function store($request)
    {
        $data  = $this->setData($request);  
		
        $data['order_no'] = 1000;
		$user = $this->model()->create($data);
    }  
   
      // give data required to render pag
      public function edit($id)
      {
          $user = $this->model()->findOrFail($id);
          return array_merge(['user' => $user], $this->getPageData());
      }

    // update data
    public function update($id, $request)
    {
        $update_data  = $this->setData($request); // new input data
        if($update_data && $request['password']){
            $update_data['password'] = bcrypt($request['password']);            
        }

        $model = $this->model()->find($id);
        $model->update($update_data);
    }
    public function getPageData()
    {
        $config = config('constants');
        return [
           
        ];
    }
//  delete 
    public function delete($id)
    {        
    	$this->staff_repo->delete($id);
        return redirect()->back();
    }    
    
    protected function setData($request)
      {
          $data =   [
              'name' => $request['name'],
              'position' => $request['position'],
              'email' => $request['email'],
              'deparment' => $request['deparment'],
              'password' =>bcrypt($request['password']),
             
          ];
  
          // skills set
          return $data;
      }  

      
      public function authenticate(Request $request)
      {
          $credentials = $request->only('email', 'password');
          return Auth::attempt($credentials);
        
      }
      public function logout(Request $request){
        
        $user = auth()->user();
        $user_action = ' Logout';    
        Auth::logout();  
        return true;
    }

    public function getSearch($request){

        $sort = $request['sort']?? '';
        $order = $request['order']?? '';
        $column=$type='';
        if($sort!= ''){
            $column = $sort;
            $type = $order;
        } else {
            $column ='users.name';
            $type = 'desc';
        }

        $data_row_per_page = $request['per_page'];
        /**
         * KEYWORD SEARCH
         * @param keyword
         */
        if($request->keyword){
            $keyword = $request->keyword;
            $query = $this->user_repo->model()
            ->where('name','like',"%$keyword%")
            
            ->orWhereHas('users',function($subquery) use($keyword){
                $subquery->whereDate('created_at', 'like', "%$keyword%")
                ->orWhere('name', 'like', "%$keyword%")
                ->orWhere('email', 'like', "%$keyword%")
                ->orWhere('deparment', 'like', "%$keyword%")
                ->orWhere('position', 'like', "%$keyword%");
            });

            $users = $query->orderBy($column, $type)->paginate($data_row_per_page);
            
           
        }

        // MULTIPARAMETERS SEARCH

        // $dateFrom = $request['date_from'];     
        // $dateTo = $request['date_to']; 
        $id = $request['id'];
        $name = $request['name'];
        $email = $request['email'];              
        $deparment = $request['deparment']; 
        $position = $request['position'];
      

        $sort = $request['sort']?? '';
        $order = $request['order']?? '';
        $column=$type='';
        if($sort!= ''){
            $column = $sort;
            $type = $order;
        } else {
            $column ='users.created_at';
            $type = 'desc';
        }

        $query = $this->user_repo->model()
        ->where('name','like',"%$name%")
        ->whereHas('users', function($subquery) use ($id,$email,$deparment,$position){
            $subquery->where('id', 'like', "%$id%")
                    ->where('name', 'like', "%$name%")
                    ->where('email', 'like', "%$email%")
                    ->where('deparment', 'like', "%$deparment%")
                    ->where('position', 'like', "%$position%");
        });

      
        
        $users = $query->orderBy($column, $type)->paginate($data_row_per_page);
     
       dd($users);
        // return $users;
    }

        
}