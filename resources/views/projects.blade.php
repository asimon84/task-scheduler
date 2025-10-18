@extends('partials.layout')

@section('title', 'Projects')

@push('styles')
    @vite('resources/css/projects.css')
@endpush

@push('scripts')
    <script>
        window.route = "{{ route('projects.get-table') }}";
    </script>

    @vite('resources/js/projects.js')
@endpush

@section('content')
    <div>
        <h3>Projects</h3>

        <ul id="mySortableList" class="list-group">
            <li class="list-group-item">Item 1</li>
            <li class="list-group-item">Item 2</li>
            <li class="list-group-item">Item 3</li>
        </ul>
    </div>
@endsection