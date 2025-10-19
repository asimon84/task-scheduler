<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    /**
     * Show the view for the Project page
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request):View {
        return view('projects', []);
    }

    /**
     * Get data for Projects table
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTable(Request $request):JsonResponse {
        return DataTables::of(Project::all())
            ->addIndexColumn()
            ->addColumn('actions', function($row){
                $buttons = '<div style="width: 130px;">';

//                $buttons .= '<button type="button" class="btn btn-info view-record" data-id="'.$row->id.'"><i class="bi bi-search"></i></button>';
                $buttons .= '<button type="button" class="btn btn-success edit-record" data-bs-toggle="modal" data-bs-target="#projectModal" data-id="'.$row->id.'"><i class="bi bi-pencil"></i></button>';
                $buttons .= '<button type="button" class="btn btn-danger delete-record" data-id="'.$row->id.'"><i class="bi bi-trash"></i></button>';

                $buttons .= '</div>';

                return $buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Get a Project
     *
     * @param Request $request
     * @param int $id
     *
     * @return string
     */
    public function show(Request $request, int $id):string {
        return Project::find($id)->toJSON();
    }

    /**
     * Create new Project and return success or failure
     *
     * @param Request $request
     *
     * @return bool
     */
    public function create(Request $request):bool {
        $record = new Project();

        $record->name = $request->input('name');
        $record->description = $request->input('description');

        return $record->save();
    }

    /**
     * Update a Project and return success or failure
     *
     * @param Request $request
     * @param int $id
     *
     * @return bool
     */
    public function edit(Request $request, int $id):bool {
        $record = Project::find($id);

        $record->name = $request->input('name');
        $record->description = $request->input('description');

        return $record->save();
    }

    /**
     * Delete a Project and return success or failure
     *
     * @param Request $request
     * @param int $id
     *
     * @return bool
     */
    public function delete(Request $request, int $id):bool {
        return (bool) Project::destroy($id);
    }
}
