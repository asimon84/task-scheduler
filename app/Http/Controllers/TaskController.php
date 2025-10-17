<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class TaskController extends Controller
{
    /**
     * Show the view for the Task page
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request):View {
        return view('tasks', []);
    }

    /**
     * Get data for tasks table
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTable(Request $request):JsonResponse {
        return DataTables::of(Task::all())
            ->addIndexColumn()
            ->addColumn('actions', function($row){
                $buttons = '<div style="width: 130px;">';

//                $buttons .= '<button type="button" class="btn btn-info view-record" data-bs-toggle="modal" data-bs-target="#taskModal" data-id='.$row->id.'><i class="bi bi-search"></i></button>';
                $buttons .= '<button type="button" class="btn btn-success edit-record" data-bs-toggle="modal" data-bs-target="#taskModal" data-id='.$row->id.'><i class="bi bi-pencil"></i></button>';
                $buttons .= '<button type="button" class="btn btn-danger delete-record" data-id='.$row->id.'><i class="bi bi-trash"></i></button>';

                $buttons .= '</div>';

                return $buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Get a task
     *
     * @param Request $request
     * @param int $id
     *
     * @return string
     */
    public function show(Request $request, int $id):string {
        return Task::find($id)->toJSON();
    }

    public function create(Request $request) {

    }

    /**
     * Update a task and return success or failure
     *
     * @param Request $request
     * @param int $id
     *
     * @return bool
     */
    public function edit(Request $request, int $id):bool {
        $record = Task::find($id);

        $record->name = $request->input('name');
        $record->description = $request->input('description');

        return $record->save();
    }

    /**
     * Delete a task and return success or failure
     *
     * @param Request $request
     * @param int $id
     *
     * @return bool
     */
    public function delete(Request $request, int $id):bool {
        return (bool) Task::destroy($id);
    }
}
