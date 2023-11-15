<?php

namespace App\Http\Controllers;
use Bouncer;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Mo;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $models = Mo::all();
        //$models = Mo::get()->toQuery()->paginate();
        $roles = Role::all();
        return view('roles.index', compact('roles','models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //Role::create($request->all());
        $role_name = request()->name;

        $role_name =Bouncer::role()->firstOrCreate([
            'name' => request()->name,
            'title' => request()->title,
        ]);

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
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
}
