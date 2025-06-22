<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'id_classe';
    
    protected $fillable = [
        'nom',
        'id_filière'
    ];

    public function filière()
    {
        return $this->belongsTo(Filière::class, 'id_filière');
    }

    public function étudiants()
    {
        return $this->hasMany(Étudiant::class, 'id_classe');
    }

    public function modules()
    {
        return $this->hasMany(Module::class, 'id_classe');
    }
}
