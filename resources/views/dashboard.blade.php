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
        <h3>Projects</h3>

        <ul id="mySortableList" class="list-group" data-project-id="1">
            <li class="list-group-item" data-task-id="1">Item 1</li>
            <li class="list-group-item" data-task-id="2">Item 2</li>
            <li class="list-group-item" data-task-id="3">Item 3</li>
        </ul>

        <ul id="mySortableList" class="list-group" data-project-id="2">
            <li class="list-group-item" data-task-id="1">Item 1</li>
            <li class="list-group-item" data-task-id="2">Item 2</li>
            <li class="list-group-item" data-task-id="3">Item 3</li>
        </ul>
    </div>
@endsection
