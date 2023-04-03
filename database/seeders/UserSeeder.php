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
            'email'=>'super@gmail.com',
            'password'=>bcrypt('123'),
            'email_verified_at'=>now()
           ])->roles()->sync('1');


        User::create([
        'name' => 'Edwin Merino',
        'email'=>'ed@gmail.com',
        'password'=>bcrypt('123'),
        'email_verified_at'=>now()
       ])->roles()->sync('2');


       User::create([
        'name' => 'Doctor de prueba',
        'email'=>'doctor@gmail.com',
        'password'=>bcrypt('123'),
        'email_verified_at'=>now()
       ])->roles()->sync('3');

       User::create([
        'name' => 'Paciente de prueba',
        'email'=>'patient@gmail.com',
        'password'=>bcrypt('123'),
        'email_verified_at'=>now()
       ])->roles()->sync('4');

       User::factory(50)->create();
       User::factory(100)->create()->each(function ($user){
           $user->assignRole('user');
       });

       User::factory(20)->create()->each(function ($user){
        $user->assignRole('doctor');
    });

    User::factory(100)->create()->each(function ($user){
        $user->assignRole('patient');
    });

    }
}
