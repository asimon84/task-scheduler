@extends('partials.layout')

@section('title', 'Dashboard')

@push('styles')
    @vite('resources/css/dashboard.css')
@endpush

@push('scripts')
    <script>
        window.route = "{{ route('priority') }}";
    </script>

    @vite('resources/js/dashboard.js')
@endpush

@section('content')
    <div>
        <h3>Dashboard</h3>

        <br/>

        @if(!empty($unassignedTasks))
            <div class="card">
                <div class="card-header">
                    Unassigned Tasks
                </div>
                <div class="card-body">
                    <ul id="mySortableList" class="list-group" data-project-id="null">
                        @foreach($unassignedTasks as $unassignedTask)
                            <li class="list-group-item" data-task-id="{{ $unassignedTask->id }}"><strong>Name: </strong>{{ $unassignedTask->name }} &nbsp; <strong>Priority: </strong><span id="priority-task-{{ $unassignedTask->id }}">N/A</span></li>
                        @endforeach
                        &nbsp;
                    </ul>
                </div>
            </div>
        @endif

        @if(!empty($projects))
            @foreach($projects as $project)
                <div class="card">
                    <div class="card-header">
                        {{ $project->name }}
                    </div>
                    <div class="card-body">
                        <ul id="mySortableList" class="list-group" data-project-id="{{ $project->id }}">
                            @foreach($project->tasks as $task)
                                <li class="list-group-item" data-task-id="{{ $task->id }}"><strong>Name: </strong>{{ $task->name }} &nbsp; <strong>Priority: </strong><span id="priority-task-{{ $task->id }}">{{ $task->priority }}</span></li>
                            @endforeach
                            &nbsp;
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
