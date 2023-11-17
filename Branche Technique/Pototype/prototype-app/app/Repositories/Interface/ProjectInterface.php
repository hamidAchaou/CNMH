<?php

namespace App\Repositories\Interface;

interface ProjectInterface {
    public function getAll();
    public function create(array $data);
    public function find($id);
    public function show($id);
    public function Update(array $data, $id);
    public function delete($id);
    public function search(string $searchValue);
}