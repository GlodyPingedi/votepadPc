<?php

namespace Database\Seeders;

use App\Models\Assertion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssertionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assertion::factory()->count(750)->create();
    }
}
