<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()->create([
            'name' => 'Test Task 1',
            'description' => 'This is an example task for testing.',
        ]);

        Task::factory()->create([
            'name' => 'Test Task 2',
            'description' => 'This is an example task for testing.',
        ]);

        Task::factory()->create([
            'name' => 'Test Task 3',
            'description' => 'This is an example task for testing.',
        ]);

        Task::factory()->create([
            'name' => 'Test Task 4',
            'description' => 'This is an example task for testing.',
        ]);

        Task::factory()->create([
            'name' => 'Test Task 5',
            'description' => 'This is an example task for testing.',
        ]);

        Task::factory()->create([
            'name' => 'Test Task 6',
            'description' => 'This is an example task for testing.',
        ]);
    }
}
