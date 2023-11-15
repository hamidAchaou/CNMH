<?php

namespace App\Repositories\Interfaces;

use App\Models\Competence;

interface InterfaceCompetences {
    public function getAll();
    public function create(array $data);
    public function find(int $id);
    public function update($id, array $data);
    public function delete($id);
    public function search($dataSearch);

}
