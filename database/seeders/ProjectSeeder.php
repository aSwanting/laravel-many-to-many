<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 100; $i++) {
            $new_project = new Project();
            $new_project->title = $faker->sentence(5);
            $new_project->slug = Str::slug($new_project->title, '-');
            $new_project->description = $faker->text(300);
            $new_project->type_id = Type::all()->random()->id;
            $new_project->save();
            $new_project->technologies()->attach(Technology::all()->random(mt_rand(0, Technology::count())));
        }
    }
}
