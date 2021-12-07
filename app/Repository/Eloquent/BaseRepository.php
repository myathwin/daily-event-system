<?php   

namespace App\Repository\Eloquent;   

use App\Interfaces\EloquentInterface; 
use Illuminate\Database\Eloquent\Model;   
use App\Jobs\SendCrudData;

class BaseRepository implements EloquentInterface 
{     
    /**      
     * @var Model      
     */     
    protected $model;       

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
 
    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function paginate($paginate)
    {
        return $this->model->paginate($paginate);
    }

    public function count()
    {
        return $this->model->count();
      
    }

    public function with(array $with, $id = null)
    {
        if (is_null($id)) {
            return $this->model->with($with)->get();
        }

        return $this->model->with($with)->where('id', $id)->get();
    }

    public function delete($id)
    {
        $this->model->where('id', $id)->delete();
    }

   

}