<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//models
use App\Models\Project;
use App\Models\Type;

//helpers
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //per svuotare il tutto nel caso ci fossero dei dati
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });
        //per ciclare gli elementi
        for ($i=0; $i < 10; $i++) { 
            $project = new Project();
            $title = fake()->sentence();
            $project->title = $title;
            //slug per averlo come il titolo
            $slug = Str::slug($title);
            $project->slug = $slug;
            $project->image = fake()->imageUrl(200,200,'dog',true);
            $project->type_id = Type::inRandomOrder()->first()->id;
            $project->description = fake()->paragraph();
            $project->date = fake()->dateTimeThisCentury();
            $project->save();
        }
    }
}
