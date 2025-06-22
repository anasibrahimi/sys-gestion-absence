<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<button class="mobile-toggle" id="toggleSidebar"><i class="bi bi-list"></i></button>
<body class="bg-gray-100">

    @include('partials.sidebar')
<div id="content" class="container mx-30 flex justify-center  min-h-screen">
     <div class="container mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold mb-6">Liste des étudiants</h2>
        <a href="{{ route('etudiants.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Ajouter un étudiant</a>
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Prénom</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Classe</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($etudiants as $etudiant)
                    <tr>
                        <td class="px-4 py-2">{{ $etudiant->id_étudiant }}</td>
                        <td class="px-4 py-2">{{ $etudiant->nom }}</td>
                        <td class="px-4 py-2">{{ $etudiant->prénom }}</td>
                        <td class="px-4 py-2">{{ $etudiant->email }}</td>
                        <td class="px-4 py-2">{{ $etudiant->classe->nom ?? '-' }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('etudiants.edit', $etudiant->id_étudiant) }}" class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">Modifier</a>
                            <form action="{{ route('etudiants.destroy', $etudiant->id_étudiant) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
</body>
</html> 