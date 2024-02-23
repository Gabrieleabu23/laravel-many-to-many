<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Technology;
use App\Models\Project;
class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technology :: factory()
            -> count(5)
            -> create()
            -> each(function($tag) {

            $projects = Project :: inRandomOrder()->limit(5)->get();
            $tag -> projects() -> attach($projects);
            $tag -> save();
        });
    }
}
