<?php

namespace App\Repositories;

use App\Models\Member;
use App\Models\User;
use App\Repositories\Interfaces\InterfaceMembers;

// use App\Repositories\Interfaces\InterfaceMembers;

class MembersRepository implements InterfaceMembers
{
    public function getAll($perPage = 3)
    {
        return User::where('role', '=', 'member')->paginate($perPage);
    }

    /**
     * Find one member by ID.
     */
    public function find($id)
    {
        $member = User::findOrFail($id);
        return $member;
    }
    // create Members
    public function create(array $data)
    {
        User::create($data);
    }

    // update Members
    public function update(array $data, $id)
    {
        // $dataProject = Project::findOrFail($id);
        $dataMember = $this->find($id);
        if ($dataMember) {
            $dataMember->update($data);
            return true;
        }
        return abort(403);
    }

    // delete Member
    public function delete($id)
    {
        $members = $this->find($id);

        if ($members) {
            $members->delete();
        }
    }

    // search data
    public function search($dataSearch)
    {
        $results = User::where('firstName', 'like', '%' . $dataSearch . '%')
                        ->orWhere('lastName', 'like', '%' . $dataSearch . '%')
                        ->paginate(4);
    
        return view('members.data', compact('results'))->render();
    }
}
