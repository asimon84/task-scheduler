@extends('partials.layout')

@section('title', 'Dashboard')

@push('styles')
    @vite('resources/css/dashboard.css')
@endpush

@push('scripts')
    <script>
        window.projectsListRoute = "{{ route('projects-list') }}";
        window.priorityRoute = "{{ route('priority') }}";
    </script>

    @vite('resources/js/dashboard.js')
@endpush

@section('content')
    <div>
        <div class="pb-3 mb-4 border-bottom">
            <h1>Dashboard</h1>
        </div>

        <!-- Project Dropdown -->
        <div class="d-flex justify-content-end">
            <select id="projects-dropdown" class="form-select form-select-lg mb-3">
                <option value="" selected="selected">View All Projects</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Unassigned Task List -->
        @if(!empty($unassignedTasks))
            <div class="card">
                <div class="card-header">
                    Unassigned Tasks
                </div>
                <div class="card-body">
                    <ul class="list-group" data-project-id="null">
                        @foreach($unassignedTasks as $unassignedTask)
                            <li class="list-group-item" data-task-id="{{ $unassignedTask->id }}"><strong>Name: </strong>{{ $unassignedTask->name }} &nbsp; <strong>Priority: </strong><span id="priority-task-{{ $unassignedTask->id }}">N/A</span></li>
                        @endforeach
                        &nbsp;
                    </ul>
                </div>
            </div>
        @endif

        <!-- Projects List -->
        <div id="projects-card">

        </div>
    </div>
@endsection
