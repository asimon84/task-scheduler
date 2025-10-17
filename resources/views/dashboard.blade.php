@extends('partials.layout')

@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
@endpush

@push('scripts')
    <script>
        window.route = "{{ route('projects.get') }}";
    </script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
    @vite('resources/js/dashboard.js')
@endpush

@section('content')
    <div>
        <h3>Dashboard</h3>


    </div>
@endsection
