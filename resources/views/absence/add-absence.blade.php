<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Absences</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<button class="mobile-toggle" id="toggleSidebar"><i class="bi bi-list"></i></button>

    @include('partials.sidebar')
       
    <div id="content" class="container mx-30 flex justify-center  min-h-screen">
        <div class="w-full max-w-6xl">
            <h1 class="text-2xl font-bold mb-6 text-center">
                @if($groupeName)
                    Add Absences For : {{ $groupeName }}
                @else
                    Add Absences
                @endif
            </h1>
            
            @if($étudiants->count() > 0)
                <form action="{{ route('absences.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
                    @csrf
                    <h2 class="text-xl font-semibold mb-4">Session Details</h2>
                    <div class="mb-4">
                        <label for="seanceDate" class="block text-sm font-medium">Date:</label>
                        <input value="{{ date('Y-m-d') }}" type="date" name="seanceDate" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="mb-4">
                        <label for="seanceTime" class="block text-sm font-medium">Seance:</label>
                        <select id="seanceTime" name="seanceTime" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">Choisir la seance</option>
                            <option value="1">Seance 1 : 8:00/10:00</option>
                            <option value="2">Seance 2 : 10:00/12:00</option>
                            <option value="3">Seance 3 : 14:00/16:00</option>
                            <option value="4">Seance 4 : 16:00/18:00</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="module_id" class="block text-sm font-medium">Matiere:</label>
                        <select id="module_id" name="module_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">Choisir la matiere</option>
                            @foreach($modules as $module)
                                <option value="{{ $module->id_module }}">{{ $module->nom . " / " . $module->enseignant->prénom . " " . $module->enseignant->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <h2 class="text-xl font-semibold mb-4">Absences</h2>
                    <table class="table-auto w-full border-collapse border border-gray-300 mb-4">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2  text-gray-600">N</th>
                                <th class="border border-gray-300 px-4 py-2">Nom</th>
                                <th class="border border-gray-300 px-4 py-2">Prenom</th>
                                <th class="border border-gray-300 px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody id="absences">
                            @foreach($étudiants as $index => $étudiant)
                            <tr class="absence">
                                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $étudiant->nom }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $étudiant->prénom }}
                                    <input type="hidden" name="absences[{{ $index }}][étudiantId]" value="{{ $étudiant->id_étudiant }}">
                                </td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <input type="checkbox" name="absences[{{ $index }}][status]" value="1" class="rounded"> Absence
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Enregistrer</button>
                </form>
            @else
                <div class="bg-white p-6 rounded shadow-md text-center">
                    <div class="text-gray-500 mb-4">
                        @if($groupeName)
                            <p class="text-lg">Aucun étudiant trouvé pour la classe : <strong>{{ $groupeName }}</strong></p>
                        @else
                            <p class="text-lg">Aucun étudiant disponible</p>
                        @endif
                    </div>
                    <a href="{{ route('filieres.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                        Retour à la sélection de classe
                    </a>
                </div>
            @endif
        </div>
    </div>
</body>
</html> 