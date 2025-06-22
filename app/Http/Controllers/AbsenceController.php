<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Module;
use App\Models\Étudiant;
use App\Models\Séance;
use App\Models\Classe;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AbsenceController extends Controller
{
 

    /**
     * Show the form for creating a new absences.
     */
    public function create(): View
    {
        $groupeName = request()->get('groupeName');
        
        if ($groupeName) {
            // Find the class by name and get its students
            $classe = Classe::where('nom', $groupeName)->first();
            
            if ($classe) {
                $étudiants = $classe->étudiants;
                $modules = Module::where('id_classe', $classe->id_classe)->get();
            } else {
                $étudiants = collect();
                $modules = collect();
            }
        } else {
            // Fallback: get all students and modules if no class is selected
            $étudiants = Étudiant::all();
            $modules = Module::all();
        }
        
        return view('absence.add-absence', compact('étudiants', 'modules', 'groupeName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
       
        // First, create and find the session
        $séance = Séance::firstOrCreate([
            'date' => $request->seanceDate,
            'time' => $request->seanceTime,
            'id_module' => $request->module_id,
        ]);

        // Then create absence records for each student
        foreach ($request->absences as $absenceData) {
            $est_absent = isset($absenceData['status']) && $absenceData['status'];
            
            Absence::updateOrCreate(
                [
                    'id_étudiant' => $absenceData['étudiantId'],
                    'id_séance' => $séance->id_séance,
                ],
                [
                    'est_absent' => $est_absent,
                    'justification' => null,
                ]
            );
        }

        return redirect()->route('seances.index')
            ->with('success', 'Séance et absences enregistrées avec succès.');
    }


  } 