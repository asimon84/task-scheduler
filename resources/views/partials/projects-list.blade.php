@foreach($projects as $project)
    <div class="card">
        <div class="card-header">
            {{ $project->name }}
        </div>
        <div class="card-body">
            <ul class="list-group" data-project-id="{{ $project->id }}">
                @foreach($project->tasks as $task)
                    <li class="list-group-item" data-task-id="{{ $task->id }}"><strong>Name: </strong>{{ $task->name }} &nbsp; <strong>Priority: </strong><span id="priority-task-{{ $task->id }}">{{ $task->priority }}</span></li>
                @endforeach
                &nbsp;
            </ul>
        </div>
    </div>
@endforeach