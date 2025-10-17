<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->create([
            'name' => 'Test Project 1',
            'description' => 'This is an example project for testing.',
        ]);

        Project::factory()->create([
            'name' => 'Test Project 2',
            'description' => 'This is a second example project for testing.',
        ]);

        Project::factory()->create([
            'name' => 'Test Project 3',
            'description' => 'This is a third example project for testing.',
        ]);
    }
}
