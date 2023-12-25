<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BasRepository {
  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  abstract function getFeildsData() :array;
  abstract function model() :string;

  public function getAll() 
  {
    return $this->model->paginate(4);
  }

  // create 
  public function create(array $data) {
    $fillableData = collect($data)->only($this->getFeildsData())->all();
    return $this->model->create($fillableData);
  }

  // find 
  public function find($id) {
    return $this->model->findOrFail($id);
  }

  // update
  public function update(array $validatedData, $id) {
    
    $data = $this->model->find($id);
    if(!$data) {
      return false;
    }
    
    return $data->update($validatedData);

  }
  
  // delete
  public function destroy($id) {
    $data = $this->model->find($id);

    if (!$data) {
        return false;
    }

    try {
        return $data->delete();
    } catch (\Exception $e) {
        return false; 
    }
}


} 