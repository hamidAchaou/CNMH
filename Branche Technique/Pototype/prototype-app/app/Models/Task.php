<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'project_Id',
    ];

    public function project() {
        return $this->belongsTo(Project::class, 'project_Id', 'id');
    }

}
