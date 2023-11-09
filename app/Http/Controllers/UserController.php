<?php

namespace App\Http\Controllers;
use Bouncer;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        $roles = Bouncer::role()->all();

        return view('users', compact('users', 'roles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function assignRoles(Request $request, User $user)
    {
            // Check if the authenticated user is a super admin
        if (!auth()->user()->isA('super_admin')) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized to perform the Action']);
        }
        // Assuming your form has a field named 'roles' with an array of role IDs
        $roleIds = $request->input('roles');

        // Assign roles to the user
        Bouncer::assign($roleIds)->to($user);

        return redirect()->back()->with('success', 'Roles assigned successfully');
    }

}
