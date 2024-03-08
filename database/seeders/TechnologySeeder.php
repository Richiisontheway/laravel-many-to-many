<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//model
use App\Models\Technology;
//helpers
use Illuminate\Support\Facades\Schema;
class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });
        $technologies = [
            'Software/Application Development',
            'Web Development Projects',
            'Game Development',
            'Database Projects',
            'Cybersecurity Projects',
            'Automation and Scripting',
            'Project Management and Development Tools'
        ];
        foreach ($technologies as $technology) {
            $technology = Technology::create([
                'title' => $technology,
                'slug' => str()->slug($technology)
            ]);

        }
    
    }
}
