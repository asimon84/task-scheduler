@extends('partials.layout')

@section('title', 'Projects')

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

@vite('resources/css/projects.css')
@endpush

@push('scripts')
<script>
    window.route = "{{ route('projects.get-table') }}";
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

@vite('resources/js/dashboard.js')
@endpush

@section('content')
    <div>
        <h3>Dashboard</h3>

        <!-- Buttons -->
        <div class="d-flex justify-content-end">
            <input type="button" class="btn btn-primary" id="create-button" value="Create New Project"/>
        </div>

        <!-- Projects -->
        <table id="projectsTable" class="table table-bordered stripe hover">
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
        <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="projectModalLabel">Record Modal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="project-modal">
                            <tbody>
                            <tr>
                                <td class="bold">ID:</td>
                                <td>
                                    <input type="text" id="project-modal-id" name="project-modal-id" disabled value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td class="bold">Name:</td>
                                <td>
                                    <input type="text" id="project-modal-name" name="project-modal-name" disabled value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td class="bold">Description:</td>
                                <td>
                                <textarea type="text" id="project-modal-description" name="project-modal-description" disabled>
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
