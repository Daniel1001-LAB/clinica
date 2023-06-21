<?php

namespace Database\Seeders;

use App\Models\Symptom;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::flushEventListeners();


        $this->call(RoleSeeder::class);
        $this->call(PermisionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(HourSeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(SocialSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(WorkdaySeeder::class);
        $this->call(DisaseSeeder::class);
        $this->call(SurgerySeeder::class);
        $this->call(SymptomSeeder::class);
        $this->call(ComplementSeeder::class);
        $this->call(DenominationSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);






    }
}
