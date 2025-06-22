<?php

namespace App\Http\Controllers;

use App\Models\Séance;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class SéanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $séances = Séance::with(['module.classe', 'module.enseignant'])->get();
        return view('seance.index', compact('séances'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $seance = Séance::findOrFail($id);
        $seance->absences()->delete();
        $seance->delete();
        return redirect()->route('seances.index')
            ->with('success', 'Séance supprimée avec succès.');
    }

    public function downloadPdf($id)
    {
        $seance = Séance::with(['module.classe', 'module.enseignant', 'absences.étudiant'])->findOrFail($id);
        $pdf = Pdf::loadView('seance.seance-pdf', compact('seance'));
        $filename = 'fiche_seance_' . $seance->id_séance . '.pdf';
        return $pdf->download($filename);
    }
} 