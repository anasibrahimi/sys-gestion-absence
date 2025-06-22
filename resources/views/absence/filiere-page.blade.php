<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sélection de Filière</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function navigateToGroupDetails(groupName) {
            window.location.href = '{{ route("absences.create") }}?groupeName=' + encodeURIComponent(groupName);
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800">
    <button class="mobile-toggle" id="toggleSidebar"><i class="bi bi-list"></i></button>
    
    @include('partials.sidebar')
    
    <div id="content" class="container mx-auto p-6 flex justify-center items-center min-h-screen">
        <div class="ml-64 p-6" id="content">
            <h1 class="text-2xl font-bold mb-6 text-center">Sélectionnez votre Classe</h1>          

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($filières as $filière)
                    @php
                        $classes = $filière->classes;
                    @endphp
                    <div class="bg-white rounded-lg shadow p-6">
                        <!-- Titre de la filière -->
                        <h2 class="text-2xl font-bold text-blue-700 mb-1">
                            {{ $filière->nom }}
                        </h2>
                        <!-- Sélection de classe et bouton lien -->
                        <div class="flex flex-col items-center space-y-4">
                            <select class="w-full p-2 border border-gray-300 rounded" onchange="navigateToGroupDetails(this.value)">
                                <option disabled selected>Choisissez un groupe</option>
                                @foreach($classes as $classe)
                                    <option name="groupeName" value="{{ $classe->nom }}">
                                        {{ $classe->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>