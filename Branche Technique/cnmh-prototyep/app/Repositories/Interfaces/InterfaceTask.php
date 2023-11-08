<?php
namespace App\Repositories\Interfaces;

interface InterfaceTask {
    public function add(array $data);
    public function find(string $id);
    public function update(array $data, string $id);
    public function delete(string $id);
}