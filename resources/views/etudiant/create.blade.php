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
<div class="max-w-lg w-full mx-auto">
    <h2 class="text-2xl font-bold mb-6">Ajouter un étudiant</h2>
    <form action="{{ route('etudiants.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="nom" class="block text-gray-700 font-semibold mb-2">Nom</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="nom" name="nom" required>
        </div>
        <div class="mb-4">
            <label for="prenom" class="block text-gray-700 font-semibold mb-2">Prénom</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="prenom" name="prenom" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" name="email" required>
        </div>
        <div class="mb-6">
            <label for="classe_id" class="block text-gray-700 font-semibold mb-2">Classe</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="classe_id" name="id_classe" required>
                <option value="">Sélectionner une classe</option>
                @foreach($classes as $classe)
                    <option value="{{ $classe->id_classe }}">{{ $classe->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Ajouter</button>
            <a href="{{ route('etudiants.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Annuler</a>
        </div>
    </form>
</div>
@endsection 