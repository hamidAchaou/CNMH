<?php

namespace App\Repositories\Interface;

interface TaskInterface {
    public function create(array $data);
    public function find($id);
    // public function show($id);
    // public function Update(array $data, $id);
}