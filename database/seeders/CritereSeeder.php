<?php

namespace Database\Seeders;

use App\Models\Critere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CritereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Critere::factory()->count(15)->create();
    }
}
