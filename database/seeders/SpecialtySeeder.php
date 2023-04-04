<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/especialidades.json');
        $data =json_decode($json);


        foreach($data as $obj){
            $specialty = new Specialty();
            $specialty->name=mb_strtolower($obj->name);
            $specialty->slug=Str::slug($obj->name);
            $specialty->save();
        }
    }
}
