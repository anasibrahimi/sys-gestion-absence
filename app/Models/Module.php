<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';
    protected $primaryKey = 'id_module';
    
    protected $fillable = [
        'nom',
        'id_classe',
        'id_enseignant'
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'id_enseignant');
    }

    public function séances()
    {
        return $this->hasMany(Séance::class, 'id_module');
    }
}
