@extends('partials.layout')

@section('title', 'Tasks')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

    @vite('resources/css/tasks.css')
@endpush

@push('scripts')
    <script>
        window.route = "{{ route('tasks.get-table') }}";
    </script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

    @vite('resources/js/tasks-table.js')
@endpush

@section('content')
    <div>
        <div class="pb-3 mb-4 border-bottom">
            <h1>Tasks</h1>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-end">
            <input type="button" class="btn btn-primary" id="create-button" value="Create New Task"/>
        </div>

        <!-- Tasks -->
        <table id="tasksTable" class="table table-bordered stripe hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th width="100px">Actions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="taskModalLabel">Record Modal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="task-modal">
                            <tbody>
                            <tr>
                                <td class="bold">ID:</td>
                                <td>
                                    <input type="text" id="task-modal-id" name="task-modal-id" disabled value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td class="bold">Name:</td>
                                <td>
                                    <input type="text" id="task-modal-name" name="task-modal-name" disabled value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td class="bold">Description:</td>
                                <td>
                                <textarea type="text" id="task-modal-description" name="task-modal-description" disabled>
                                    &nbsp;
                                </textarea>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save-button">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection