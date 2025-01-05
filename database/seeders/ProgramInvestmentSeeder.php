<?php

namespace Database\Seeders;

use App\Models\Investment;
use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramInvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::factory(15)->create();
        Investment::factory(15)->create();
    }
}
