<?php

namespace Database\Seeders;

use App\Models\Office;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Super Administrador',
            'email' => 'super@gmail.com',
            'password' => bcrypt('123'),
            'profile' => 'ADMIN',
            'email_verified_at' => now()
        ])->roles()->sync('1');

        User::create([
            'name' => 'Edwin Merino',
            'email' => 'ed@gmail.com',
            'password' => bcrypt('123'),
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'email_verified_at' => now()
        ])->roles()->sync('2');

        User::create([
            'name' => 'Empleado de Prueba',
            'email' => 'empleado@gmail.com',
            'password' => bcrypt('123'),
            'profile' => 'EMPLOYEE',
            'status' => 'ACTIVE',
            'email_verified_at' => now()
        ])->roles()->sync('6');

        User::create([
            'name' => 'Admin de Caja',
            'email' => 'admincaja@gmail.com',
            'password' => bcrypt('123'),
            'profile' => 'ADMIN-POS',
            'status' => 'ACTIVE',
            'email_verified_at' => now()
        ])->roles()->sync('7');


        User::create([
            'name' => 'Doctor de prueba',
            'email' => 'doctor@gmail.com',
            'password' => bcrypt('123'),
            'email_verified_at' => now()
        ])->roles()->sync('3');

        User::create([
            'name' => 'Paciente de prueba',
            'email' => 'patient@gmail.com',
            'password' => bcrypt('123'),
            'email_verified_at' => now()
        ])->roles()->sync('4');

        User::factory(50)->create();
        User::factory(100)->create()->each(function ($user) {
            $user->assignRole('user');
        });

        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('client');
            $user->profile = ('client');
        });

        User::factory(20)->create()->each(function ($user) {
            $user->assignRole('doctor');
        });

        User::factory(100)->create()->each(function ($user) {
            $user->assignRole('patient');
        });
    }
}
