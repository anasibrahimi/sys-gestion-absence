<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>

    <div class="col-md-3 col-lg-2 sidebar" id="sidebar">
        <div class="sidebar-header d-flex align-items-center justify-content-center">
            <h1 class="h5 mb-0 fw-bold">System de gestion des absences</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="{{ route('dashboard') }}" class="sidebar-menu-button {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Tableau de bord
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('filieres.index') }}" class="sidebar-menu-button {{ request()->routeIs('filières.*') ? 'active' : '' }}">
                        <i class="bi bi-building"></i> Mes Filières
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('etudiants.index') }}" class="sidebar-menu-button {{ request()->routeIs('etudiants.*') ? 'active' : '' }}">
                        <i class="bi bi-person-lines-fill"></i> Gestion des étudiants
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('seances.index') }}" class="sidebar-menu-button {{ request()->routeIs('absences.*') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check"></i> Historique d'absence
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidebar-footer">
            <div class="dropup">
                <button class="btn btn-primary dropdown-toggle dropup-button" id="actionBtn" type="button" onclick="toggleDropdown('actionDropdown')">
                    <i class="bi bi-person-gear"></i> Mon Compte
                </button>
                <ul class="dropdown-menu action-dropdown" id="actionDropdown">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right"></i> Log out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-content" style="margin-left:260px; padding:2rem;">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(event) {
            if (!event.target.matches('.dropup-button')) {
                const dropdowns = document.getElementsByClassName('action-dropdown');
                for (let dropdown of dropdowns) {
                    if (dropdown.classList.contains('show')) {
                        dropdown.classList.remove('show');
                    }
                }
            }
        });
    </script>
    
</body>
</html>