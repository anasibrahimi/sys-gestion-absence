<?php

namespace App\Http\Controllers;

use App\Models\Étudiant;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ÉtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $etudiants = Étudiant::with('classe')->get();
        return view('etudiant.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $classes = Classe::all();
        return view('etudiant.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        Étudiant::create([
            'nom' => $request->nom,
            'prénom' => $request->prenom,
            'email' => $request->email,
            'id_classe' => $request->id_classe,
        ]);

        return redirect()->route('etudiants.index')
            ->with('success', 'Étudiant créé avec succès.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $classes = Classe::all();
        $etudiant = Étudiant::findOrFail($id);
        return view('etudiant.edit', ['etudiant' => $etudiant, 'classes' => $classes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $etudiant = Étudiant::findOrFail($id);
        $etudiant->update([
            'nom' => $request->nom,
            'prénom' => $request->prenom,
            'email' => $request->email,
            'id_classe' => $request->id_classe,
        ]);
        return redirect()->route('etudiants.index')
            ->with('success', 'Étudiant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $etudiant = Étudiant::findOrFail($id);
        $etudiant->absences()->delete();
        $etudiant->delete();
        
        return redirect()->route('etudiants.index')
            ->with('success', 'Étudiant et ses absences ont été supprimés avec succès.');
    }
} 