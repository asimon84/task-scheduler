<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TaskController extends Controller
{
    /**
     * Show the view for the Task page
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        return view('tasks', []);
    }

    /**
     * Get data for tasks table
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTable(Request $request) {
        return DataTables::of(Task::all())
            ->addIndexColumn()
            ->addColumn('actions', function($row){
                $buttons = '<div style="width: 130px;">';

                $buttons .= '<button type="button" class="btn btn-info view-record" data-bs-toggle="modal" data-bs-target="#recordModal" data-id='.$row->id.'><i class="bi bi-search"></i></button>';
                $buttons .= '<button type="button" class="btn btn-success edit-record" data-bs-toggle="modal" data-bs-target="#recordModal" data-id='.$row->id.'><i class="bi bi-pencil"></i></button>';
                $buttons .= '<button type="button" class="btn btn-danger delete-record" data-id='.$row->id.'><i class="bi bi-trash"></i></button>';

                $buttons .= '</div>';

                return $buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
