<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $table = 'users';
 
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
    ];
    
    // This scope retrieves only users with the 'role' set to 'member'
    public function scopeMembers($query)
    {
        return $query->where('role', '=', 'member');
    }
}
