<?php

namespace Database\Seeders;

use App\Models\Disase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DisaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/disases.json');
        $data = json_decode($json);
        foreach($data as $obj){
            $disase = new Disase();
            $disase->name = mb_strtolower($obj->name);
            $disase->slug = Str::slug($obj->name);
            $disase->symptoms = $obj->symptoms;
            $disase->save();
        }
    }
}
