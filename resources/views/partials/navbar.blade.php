<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Task Scheduler</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('projects') ? 'active' : '' }}" href="{{ url('projects') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteNamed('tasks') ? 'active' : '' }}" href="{{ url('tasks') }}">Tasks</a>
                </li>
            </ul>
        </div>
    </div>
</nav>