<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the view for the Dashboard page
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $unassignedTasks = Task::where('project_id', null)->get();
        $projects = Project::all();

        return view('dashboard', [
            'unassignedTasks' => $unassignedTasks,
            'projects' => $projects,
        ]);
    }

    /**
     * Update tasks' projects and priorities
     *
     * @param Request $request
     *
     * @return bool
     */
    public function updatePriority(Request $request):bool {
        $projectId = $request->get('projectId');
        $taskIds = $request->get('taskIds');

        $data = [];

        for ($i = 0; $i < count($taskIds); $i++) {
            $data[] = ['id' => $taskIds[$i], 'project_id' => $projectId, 'priority' => ($i + 1)];
        }

        return Task::upsert($data, ['id'], ['project_id', 'priority']);
    }
}
