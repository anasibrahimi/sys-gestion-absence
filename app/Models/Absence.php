<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $table = 'absences';
    protected $primaryKey = 'id_absence';
    
    protected $fillable = [
        'id_étudiant',
        'id_séance',
        'est_absent',
        'justification'
    ];

    protected $casts = [
        'est_absent' => 'boolean'
    ];

    public function étudiant()
    {
        return $this->belongsTo(Étudiant::class, 'id_étudiant');
    }

    public function séance()
    {
        return $this->belongsTo(Séance::class, 'id_séance');
    }
}
