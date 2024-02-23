<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;
use App\Models\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = Type::inRandomOrder() ->get();
        // Crea e associa un progetto per ciascun tipo però in base al count del typeseeder
        // $types->each(function ($type) {
        //     $project = Project::factory()->make();
        //     $project->type()->associate($type);
        //     $project->save();
        // });

        // Crea e associa un progetto per ciascun tipo però in base al count del projectseeder
        // succede projectCount*typeCount ... in questo caso 10 progetti * i tipi esistenti(2) = 20
        $types->each(function ($type) {
            $projects = Project::factory()->count(2)->make();
            
            $projects->each(function ($project) use ($type) {
                $project->type()->associate($type);
                $project->save();
            });
        });

    }
}
