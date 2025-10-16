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
    }
}
