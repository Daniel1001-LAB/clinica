<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name'=>'admin.index','privilege'=>'admin panel']);
        Permission::create(['name'=>'roles.index','privilege'=>'role list']);
        Permission::create(['name'=>'roles.create','privilege'=>'role create']);
        Permission::create(['name'=>'roles.store','privilege'=>'role create']);
        Permission::create(['name'=>'roles.edit','privilege'=>'role edit']);
        Permission::create(['name'=>'roles.update','privilege'=>'role edit']);
        Permission::create(['name'=>'roles.destroy','privilege'=>'role delete']);
        Permission::create(['name'=>'roles.show','privilege'=>'role view']);

        //Permisos de Usuarios

        Permission::create(['name'=>'users.index','privilege'=>'user list']);
        Permission::create(['name'=>'users.create','privilege'=>'user create']);
        Permission::create(['name'=>'users.store','privilege'=>'user create']);
        Permission::create(['name'=>'users.edit','privilege'=>'user edit']);
        Permission::create(['name'=>'users.update','privilege'=>'user edit']);
        Permission::create(['name'=>'users.destroy','privilege'=>'user delete']);
        Permission::create(['name'=>'users.show','privilege'=>'user view']);

        //Permisos de Especialidades

         Permission::create(['name'=>'specialties.index','privilege'=>'specialties list']);
         Permission::create(['name'=>'specialties.create','privilege'=>'specialties create']);
         Permission::create(['name'=>'specialties.store','privilege'=>'specialties create']);
         Permission::create(['name'=>'specialties.edit','privilege'=>'specialties edit']);
         Permission::create(['name'=>'specialties.update','privilege'=>'specialties edit']);
         Permission::create(['name'=>'specialties.destroy','privilege'=>'specialties delete']);
         Permission::create(['name'=>'specialties.show','privilege'=>'specialties view']);

        //Permiso de doctor admin
        Permission::create(['name'=>'doctor.index','privilege'=>'doctor panel']);

        //Permisos de Office

        Permission::create(['name'=>'offices.index','privilege'=>'office list']);
        Permission::create(['name'=>'offices.create','privilege'=>'office create']);
        Permission::create(['name'=>'offices.store','privilege'=>'office create']);
        Permission::create(['name'=>'offices.edit','privilege'=>'office edit']);
        Permission::create(['name'=>'offices.update','privilege'=>'office edit']);
        Permission::create(['name'=>'offices.destroy','privilege'=>'office delete']);
        Permission::create(['name'=>'offices.show','privilege'=>'office view']);

        Permission::create(['name'=>'curriculum.index','privilege'=>'curriculum panel']);

        $permissions = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
        $superAdmin = Role::findByName('super-admin');
        $admin = Role::findByName('admin');
        $superAdmin->givePermissionTo($permissions);
        $admin->givePermissionTo($permissions);

        //Asignaciones de permisos de doctores
        $permissions = [16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
        $doctor = Role::findByName('doctor');
        $superAdmin->givePermissionTo($permissions);
        $doctor->givePermissionTo($permissions);
    }
}
