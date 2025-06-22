<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@extends('partials.sidebar')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h2 class="text-2xl font-bold text-blue-700 mb-6 flex items-center"><i class="bi bi-calendar-check mr-2"></i> Historique d'absence</h2>
    <div class="mb-6">
        <input type="text" id="searchInput" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Rechercher par nom complet...">
    </div>
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Classe</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Enseignant</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Matiere</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Séance</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($séances as $séance)
                    <tr>
                        <td class="px-4 py-2">{{ $séance->id_séance }}</td>
                        <td class="px-4 py-2">{{ $séance->module && $séance->module->classe ? $séance->module->classe->nom : '-' }}</td>
                        <td class="px-4 py-2">
                            @if($séance->module && $séance->module->enseignant)
                                {{ $séance->module->enseignant->prénom }} {{ $séance->module->enseignant->nom }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $séance->module ? $séance->module->nom : '-' }}</td>
                        <td class="px-4 py-2">
                            @if ($séance->time == 1)
                                S1 - 8:00/10:00
                            @elseif ($séance->time == 2)
                                S2 - 10:00/12:00
                            @elseif ($séance->time == 3)
                                S3 - 14:00/16:00
                            @elseif ($séance->time == 4)
                                S4 - 16:00/18:00
                            @else
                                Unknown
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $séance->date }}</td>
                        <td class="px-4 py-2">
                            <div class="flex gap-2 justify-center">
                                <form action="{{ route('seances.destroy', $séance->id_séance) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette séance ?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            
                                <a href="{{ route('seances.pdf', $séance->id_séance) }}" class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition" title="Télécharger PDF">
                                    <i class="bi bi-file-earmark-pdf"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
