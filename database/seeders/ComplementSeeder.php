<?php

namespace Database\Seeders;

use App\Models\Disase;
use App\Models\Interview;
use App\Models\Medicine;
use App\Models\Pathology;
use App\Models\Surgery;
use App\Models\Symptom;
use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ComplementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/medicinas.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            $medicine = new Medicine();
            $medicine->name = mb_strtolower($obj->name);
            $medicine->slug = Str::slug($obj->name);
            // $medicine->description = $obj->description;
            $medicine->save();
        }

        $json = File::get('database/data/patologias.json');
        $data = json_decode($json);
        foreach ($data as $obj) {
            $pathology = new Pathology();
            $pathology->code = mb_strtolower($obj->c);
            $pathology->name = mb_strtolower($obj->d);
            $pathology->slug = Str::slug($obj->d);
            $pathology->save();
        }


        $patient = User::role('patient')->get();

        foreach ($patient as $p) {
            $surgeries = Surgery::inRandomOrder()->limit(3)->pluck('id');
            $symptoms = Symptom::inRandomOrder()->limit(5)->pluck('id');
            $disases = Disase::inRandomOrder()->limit(3)->pluck('id');
            $pathologies = Pathology::inRandomOrder()->limit(random_int(1, 13))->pluck('id');
            $p->surgeries()->attach($surgeries, ['year' => 1985]);
            $p->disases()->attach($disases, ['year' => 1985]);
            $doctors = User::role('doctor')->inRandomOrder()->limit(3)->pluck('id');
            foreach ($doctors as $d) {
                $interview = Interview::create([
                    'date' => now(),
                    'suspicion' => 'Sospechas',
                    'diagnosis' => 'diagnostico',
                    'doctor_id' => $d,
                    'user_id' => $p->id
                ]);
            }
            $p->symptoms()->attach($symptoms, ['interview_id' => $interview->id,
            'name' => Symptom::inRandomOrder()->limit(1)->pluck('name')->join("")
            ]);
            $p->pathologies()->attach($pathologies);
        }
    }
}
