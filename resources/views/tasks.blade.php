@extends('partials.layout')

@section('title', 'Tasks')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
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
        <h3>Tasks</h3>

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
    </div>
@endsection