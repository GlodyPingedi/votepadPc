<?php

namespace Database\Seeders;

use App\Models\QuestionPhase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionPhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        QuestionPhase::factory()->count(20)->create();
    }
}