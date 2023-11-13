<?php

namespace App\Repositories\Interfaces;

interface InterfaceProjects {
    public function getAll();
    public function getNameProjects();
    public function find($id);
    public function getTasksPaginated($id, $perPage);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function search($dataSearch);
}
?>