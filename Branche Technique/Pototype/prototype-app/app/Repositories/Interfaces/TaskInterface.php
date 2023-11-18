<?php

namespace App\Repositories\Interfaces;

interface TaskInterface {
    public function create(array $data);
    public function getAll($idProject);
    public function find($id);
    public function update(array $data, $id);
    public function delete($id);
    // public function show($id);
}