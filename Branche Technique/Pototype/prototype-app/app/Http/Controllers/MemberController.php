<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Repositories\Interfaces\InterfaceMembers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    private $membersRepository;
    public function __construct(InterfaceMembers $membersRepository)
    {
        // $this->middleware('CheckChefProjet');
        $this->membersRepository = $membersRepository;
    }
    /**
     * Display All Projects.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $searchValue = $request->input('searchValue');
            $searchValue = str_replace(' ', '%', $searchValue);
    
            $dataSearch = $this->membersRepository->search($searchValue);
    
            return view('members.data', compact('dataSearch'))->render();
        }
    
        // load all members
        $members = $this->membersRepository->getAll();
        return view('members.index', compact('members'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("members.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $firstName = strip_tags($request->input('firstName'));
        $lastName = strip_tags($request->input('lastName'));
        $email = strip_tags($request->input('email'));
        $password = Hash::make($request->password);
        $role = 'member';
    
        $data = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        ];
    
        $this->membersRepository->create($data);
    
        return redirect()->route('members.index')->with('success', 'Project added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

/**
 * Show the form for editing the specified resource.
 */
public function edit($id)
{
    $member = $this->membersRepository->find($id);
    return view('members.edit', compact('member'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);
    
        $firstName = strip_tags($request->input('firstName'));
        $lastName = strip_tags($request->input('lastName'));
        $email = strip_tags($request->input('email'));
        $role = 'member';
    
        $data = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'role' => $role,
        ];
    
        // Process other fields as before
    
        if ($request->filled('password')) {
            $password = Hash::make($request->password);
            $data['password'] = $password;
        }
    
        $this->membersRepository->update($data, $id);
    
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('memberId');

        $this->membersRepository->delete($id);

        return redirect()->route('members.index')->with('success', 'Task deleted successfully');

    }

    // function search
    public function search(Request $request)
    {
        $datasearch = $request->input('search');
    
        $results = $this->membersRepository->search($datasearch);
    
        return response()->json([
            'data' => $results->items(),
            'links' => $results->links()->toHtml(),
        ]);
    }

    // Export member
    public function export() 
    {
        return Excel::download(new Member(), 'member.xlsx');
    }

    // Emport
    public function import() 
    {
        Excel::import(new Member(), 'users.xlsx');
        
        // return redirect('/')->with('success', 'All good!');
        return redirect()->route('members.index')->with('success', 'All good!');

    }
}
