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

        $projects = Project::with(['tasks' => function ($query) {
            $query->orderBy('priority', 'asc');
        }])->get();

        return view('dashboard', [
            'unassignedTasks' => $unassignedTasks,
            'projects' => $projects,
        ]);
    }

    /**
     * Update Tasks' Project IDs and priorities, return new values
     *
     * @param Request $request
     *
     * @return array
     */
    public function updatePriority(Request $request):array {
        $projectId = $request->get('projectId');
        $taskIds = $request->get('taskIds');

        $data = [];

        if(!empty($taskIds)) {
            for ($i = 0; $i < count($taskIds); $i++) {
                $data[] = ['id' => $taskIds[$i], 'project_id' => $projectId, 'priority' => ($i + 1)];
            }

            Task::upsert($data, ['id'], ['project_id', 'priority']);
        }

        return $data;
    }

    /**
     * Get List of Projects for Dashboard
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function getProjectList(Request $request)
    {
        $projectId = $request->get('projectId');

        if (empty($projectId)) {
            $projects = Project::with(['tasks' => function ($query) {
                $query->orderBy('priority', 'asc');
            }])->get();
        } else {
            $projects = Project::where('id', $projectId)->with(['tasks' => function ($query) {
                $query->orderBy('priority', 'asc');
            }])->get();
        }

        return view('partials.projects-list', compact('projects'));
    }
}
