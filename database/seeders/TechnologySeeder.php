<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'Javascript', 'PHP', 'Vue', 'Laravel'];

        foreach ($technologies as $technology_name) {
            $new_technology = new Technology();
            $new_technology->name = $technology_name;
            $new_technology->save();
        }
    }
}
