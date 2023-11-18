<?php

namespace App\Repositories\Interfaces;

interface ProjectInterface {
    public function getAll();
    public function create($data);
    public function find($id);
    public function show($id);
    public function Update(array $data, $id);
    public function delete($id);
    public function search(string $searchValue);
}