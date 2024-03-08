<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Type;
use Illuminate\Support\Facades\Schema;
class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });
        $allTypes = [
            'HTML',
            'CSS',
            'JAVASCRIPT',
            'VUE',
            'SQL',
            'PHP',
            'LARAVEL'
        ];
        foreach ($allTypes as $singleTypes) {
            $singleTypes = Type::create([
                'title' => $singleTypes,
                'slug' => str()->slug($singleTypes)
            ]);

        }
    }
}
