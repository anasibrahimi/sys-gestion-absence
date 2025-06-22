<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Séance</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .section-title { font-size: 18px; font-weight: bold; margin-top: 20px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Fiche de Séance</h1>
        <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($seance->date)->format('d/m/Y') }}</p>
        <p><strong>Séance :</strong> 
            @if ($seance->time == 1)
                S1 - 8:00/10:00
            @elseif ($seance->time == 2)
                S2 - 10:00/12:00
            @elseif ($seance->time == 3)
                S3 - 14:00/16:00
            @elseif ($seance->time == 4)
                S4 - 16:00/18:00
            @else
                Inconnue
            @endif
        </p>
    </div>
    <div>
        <div class="section-title">Matiere</div>
        <p><strong>Nom :</strong> {{ $seance->module->nom ?? '-' }}</p>
        <p><strong>Classe :</strong> {{ $seance->module->classe->nom ?? '-' }}</p>
        <p><strong>Enseignant :</strong> {{ $seance->module->enseignant->prénom ?? '' }} {{ $seance->module->enseignant->nom ?? '' }}</p>
    </div>
    <div>
        <div class="section-title">Liste des absences</div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Justification</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seance->absences->where('est_absent', true) as $index => $absence)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $absence->étudiant->nom ?? '-' }}</td>
                        <td>{{ $absence->étudiant->prénom ?? '-' }}</td>
                        <td>{{ $absence->étudiant->email ?? '-' }}</td>
                        <td>
                            @if($absence->est_absent)
                                Absent
                            @else
                                Présent
                            @endif
                        </td>
                        <td>{{ $absence->justification ?: '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html> 