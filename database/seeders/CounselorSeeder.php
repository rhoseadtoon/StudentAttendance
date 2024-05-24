<?php

namespace Database\Seeders;

use App\Models\Counselor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounselorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Counselor::factory()->count(10)->create();

    }
}
