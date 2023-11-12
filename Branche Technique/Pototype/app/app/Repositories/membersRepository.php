<?php

namespace App\Repositories;

use App\Models\Member;
use App\Models\User;
use App\Repositories\Interfaces\InterfaceMembers;

class MembersRepository implements InterfaceMembers
{
    public function getAll($perPage = 3)
    {
        return User::where('role', '=', 'member')->paginate($perPage);
    }

        // find One members
        public function find($id) {
            $members = User::findOrFail($id);
            return $members;
        }
    // create Members
    public function create(array $data) {
        User::create($data);
    }

    // delete Member
    public function delete($id) {
        $members = $this->find($id);

        if($members) {
            $members->delete();
        }
    }
}
