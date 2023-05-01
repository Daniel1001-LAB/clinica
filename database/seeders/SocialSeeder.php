<?php

namespace Database\Seeders;

use App\Models\Social;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $json = File::get('database/data/redes.json');
    $data = json_decode($json);
        foreach ($data as $obj){
            $social = new Social();
            $social->name=mb_strtolower($obj->name);
            $social->icon=$obj->icon;
            $social->type=$obj->type;
            $social->color=$obj->color;
            $social->save();

        }
    }
}
