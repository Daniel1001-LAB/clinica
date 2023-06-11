<?php

namespace Database\Seeders;

use App\Models\Symptom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/sintomas.json');
        $data = json_decode($json);
        foreach($data as $obj){
            $surgery = new Symptom();
            $surgery->name = mb_strtolower($obj->name);
            $surgery->slug = Str::slug($obj->name);
            $surgery->save();
        }
    }
}
