<?php

namespace App\Interfaces;


use Illuminate\Database\Eloquent\Model;

/**
* Interface EloquentRepositoryInterface
* @package App\Repositories
*/
interface EloquentInterface
{
  /**
  * @param array $attributes
  * @return Model
  */
  // public function create(array $attributes): Model;

   /**
    * @return Model
    */
  public function getAll();

  /**
  * @param $id
  * @return Model
  */
  public function find($id);

  /**
  * @param array $attributes
  * @return Model
  */
  public function paginate($paginate);

  /**
  * @return Model
  */
  public function count();

  /**
  * @param array $with, $id
  * @return Model
  */
  public function with(array $with, $id = null);

  /**
  * @param $id
  * @return Model
  */
  public function delete($id);

}
