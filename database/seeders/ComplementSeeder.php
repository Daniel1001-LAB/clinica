<?php

namespace Database\Seeders;

use App\Models\Disase;
use App\Models\Interview;
use App\Models\Medicine;
use App\Models\Surgery;
use App\Models\Symptom;
use App\Models\User;
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


        $patient = User::role('patient')->get();
        $surgeries = Surgery::inRandomOrder()->limit(3)->pluck('id');
        $symptoms = Symptom::inRandomOrder()->limit(5)->pluck('id');
        $disases = Disase::inRandomOrder()->limit(3)->pluck('id');

        foreach ($patient as $p) {
            $p->surgeries()->attach($surgeries, ['year' => 1985]);
            $p->disases()->attach($disases, ['year' => 1985]);
            $doctors = User::role('doctor')->inRandomOrder()->limit(3)->pluck('id');
            foreach ($doctors as $d) {
                $interview = Interview::create([
                    'date' => now(),
                    'suspicion' => 'Sospechas',
                    'diagnosis' => 'diagnostico',
                    'doctor_id' => $d,
                    'patient_id' => $p->id
                ]);
                $p->symptoms()->attach($symptoms, ['interview_id' => $interview->id]);
            }
        }
    }
}
