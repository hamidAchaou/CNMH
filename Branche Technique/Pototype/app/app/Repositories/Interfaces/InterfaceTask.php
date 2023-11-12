<?php
namespace App\Repositories\Interfaces;

interface InterfaceTask {
    public function getAll($idProjects);
    public function add(array $data);
    public function find($id);
    public function update(array $data, string $id);
    public function delete($id);
}