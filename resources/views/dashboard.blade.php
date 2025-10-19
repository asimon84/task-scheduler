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
            <h5>Unassigned Tasks</h5>

            <ul id="mySortableList" class="list-group" data-project-id="0">
                @foreach($unassignedTasks as $unassignedTask)
                    <li class="list-group-item" data-task-id="{{ $unassignedTask->id }}"><strong>Name: </strong>{{ $unassignedTask->name }}</li>
                @endforeach
                &nbsp;
            </ul>

            <br/>
        @endif

        @if(!empty($projects))
            @foreach($projects as $project)
                <h5>{{ $project->name }}</h5>

                <ul id="mySortableList" class="list-group" data-project-id="{{ $project->id }}">
                    @foreach($project->tasks as $task)
                        <li class="list-group-item" data-task-id="{{ $task->id }}"><strong>Name: </strong>{{ $task->name }} &nbsp; <strong>Priority: </strong><span id="priority-task-{{ $task->id }}">{{ $task->priority }}</span></li>
                    @endforeach
                    &nbsp;
                </ul>

                <br/>
            @endforeach
        @endif
    </div>
@endsection
