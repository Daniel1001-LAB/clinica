<?php

namespace Database\Seeders;

use App\Models\Surgery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SurgerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/operaciones.json');
        $data = json_decode($json);
        foreach($data as $obj){
            $surgery = new Surgery();
            $surgery->name = mb_strtolower($obj->name);
            $surgery->slug = Str::slug($obj->name);
            $surgery->description = $obj->description;
            $surgery->save();
        }
    }
}
