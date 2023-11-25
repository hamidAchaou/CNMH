<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BasRepository {
  protected $model;

  public function __construct(Model $model)
  {
    $this->model;
  }

  abstract function getFeildsData() :array;
  abstract function model() :string;

  public function getAll() {
    return $this->model->all();
  }

  public function create(array $data) {
    $fillableData = collect($data)->only($this->getFeildsData())->all();
    return $this->model->create($fillableData);
  }
  
} 