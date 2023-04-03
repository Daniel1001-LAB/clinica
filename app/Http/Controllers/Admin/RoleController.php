<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.create')->only('create');
        $this->middleware('can:roles.store')->only('store');
        $this->middleware('can:roles.show')->only('show');
        $this->middleware('can:roles.update')->only('update');
        $this->middleware('can:roles.edit')->only('edit');
        $this->middleware('can:roles.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        $role = new Role();
        $title = "role create";
        $btn = "create";
        $permissions_id = [];
        return view('admin.roles.create', compact('permissions', 'role', 'btn', 'permissions_id', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        $name = $request->input('name');
        $permissions = $request->only('permissions');
        $role = Role::create(['name' => $name, 'guard_name' => 'web']);
        if (count($permissions) > 0) {
            $role->syncPermissions($permissions);
        }
        return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        $title = "role show";
        $btn = "show";
        $permissions_id = $role->permissions->pluck('id')->toArray();
        return view('admin.roles.show', compact('permissions', 'role', 'btn', 'permissions_id', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('canDeleteRole', $role);
        $permissions = Permission::orderBy('name', 'asc')->get();
        $title = "role edit";
        $btn = "update";
        $permissions_id = $role->permissions->pluck('id')->toArray();
        return view('admin.roles.edit', compact('permissions', 'role', 'btn', 'permissions_id', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('canDeleteRole', $role);
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);
        $data = $request->only('name');
        $permissions = $request->only('permissions');
        $role->update($data);
        if (count($permissions) > 0) {
            $role->syncPermissions($permissions);
        }
        return redirect()->route('roles.index')->with('success','Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
           $this->authorize('canDeleteRole', $role);
            $role->delete();
           return redirect()->route('roles.index');

    }
}
