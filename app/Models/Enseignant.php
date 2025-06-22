<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $table = 'enseignants';
    protected $primaryKey = 'id_enseignant';
    
    protected $fillable = [
        'nom',
        'prénom',
        'email'
    ];

    public function modules()
    {
        return $this->hasMany(Module::class, 'id_enseignant');
    }
}
