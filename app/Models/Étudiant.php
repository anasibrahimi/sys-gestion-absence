<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Étudiant extends Model
{
    protected $table = 'étudiants';
    protected $primaryKey = 'id_étudiant';
    
    protected $fillable = [
        'nom',
        'prénom',
        'email',
        'id_classe'
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'id_étudiant');
    }
}
