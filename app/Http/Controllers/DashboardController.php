<?php

namespace App\Http\Controllers;

use App\Models\ProjectTaskLink;
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
        return view('dashboard', []);
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

        ProjectTaskLink::whereIn('task_id', $taskIds)->delete();

        $data = [];

        for ($i = 0; $i < count($taskIds); $i++) {
            $data[] = ['project_id' => $projectId, 'task_id' => $taskIds[$i], 'priority' => ($i + 1)];
        }

        return ProjectTaskLink::insert($data);
    }
}
