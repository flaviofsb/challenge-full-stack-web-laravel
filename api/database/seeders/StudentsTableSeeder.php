<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Students;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Students::factory()->count(1)->create();
    }
}
