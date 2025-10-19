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
            <h6>Unassigned Tasks</h6>

            <ul id="mySortableList" class="list-group" data-project-id="0">
                @foreach($unassignedTasks as $unassignedTask)
                    <li class="list-group-item" data-task-id="{{ $unassignedTask->id }}">{{ $unassignedTask->name }}</li>
                @endforeach
            </ul>

            <br/>
        @endif

        @if(!empty($projects))
            @foreach($projects as $project)
                <h6>{{ $project->name }}</h6>

                <ul id="mySortableList" class="list-group" data-project-id="{{ $project->id }}">
                    @foreach($project->tasks as $task)
                        <li class="list-group-item" data-task-id="{{ $task->id }}">{{ $task->name }}</li>
                    @endforeach
                </ul>

                <br/>
            @endforeach
        @endif
    </div>
@endsection
