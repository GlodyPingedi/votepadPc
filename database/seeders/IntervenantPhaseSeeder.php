<?php

namespace Database\Seeders;

use App\Models\IntervenantPhase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntervenantPhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IntervenantPhase::factory()->count(6)->create();
    }
}
