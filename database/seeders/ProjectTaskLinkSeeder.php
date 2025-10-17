<?php

namespace Database\Seeders;

use App\Models\ProjectTaskLink;
use Illuminate\Database\Seeder;

class ProjectTaskLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectTaskLink::factory()->create([
            'project_id' => 1,
            'task_id' => 1
        ]);

        ProjectTaskLink::factory()->create([
            'project_id' => 1,
            'task_id' => 2
        ]);

        ProjectTaskLink::factory()->create([
            'project_id' => 1,
            'task_id' => 3
        ]);

        ProjectTaskLink::factory()->create([
            'project_id' => 2,
            'task_id' => 4
        ]);

        ProjectTaskLink::factory()->create([
            'project_id' => 3,
            'task_id' => 5
        ]);

        ProjectTaskLink::factory()->create([
            'project_id' => 3,
            'task_id' => 6
        ]);
    }
}
