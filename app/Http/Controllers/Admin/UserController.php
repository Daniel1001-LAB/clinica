<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\user;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create');
        $this->middleware('can:users.store')->only('store');
        $this->middleware('can:users.show')->only('show');
        $this->middleware('can:users.update')->only('update');
        $this->middleware('can:users.edit')->only('edit');
        $this->middleware('can:users.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Oldindex()
    {
        $users = ModelsUser::all();
        return view('admin.users.index', compact('users'));
    }

    public function index()
    {
        $users = ModelsUser::all();
        return view('admin.users.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $btn = "create";
        $title="new user";
        return view('admin.users.create',compact('user', 'btn', 'title'));
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
            'name' => 'required|unique:users,name',
        ]);
        $name = mb_strtolower($request->name);
        $birthdate = mb_strtolower($request->birthdate);
        $gender = mb_strtolower($request->gender);
        $phone = mb_strtolower($request->phone);
        $email = mb_strtolower($request->email);
        $user = User::create([
            'name' => $name,
            'birthdate' => $birthdate,
            'description' => $request->description,
            'phone' => $phone,
            'email' => $email,
            'gender' => $gender,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $userRole = $user->roles()->first();
        if ($userRole) {
            $userRoleId = $userRole->id;
        } else {
            $userRoleId = 0;
        }
        $roles = Role::where('id', '>=', 3)->get();
        $title = "edit user";
        $btn = "update";
        return view('admin.users.edit', compact('user', 'title', 'btn', 'roles', 'userRoleId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $role = $request->input('role');
        $user->roles()->sync($role);
        return redirect()->route('users.index')->with('success', 'Registro actualizado correctamente');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $this->authorize('canDeleteRole', $user);
        $user->delete();
        return redirect()->route('roles.index');
    }
}
