<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filière extends Model
{
    protected $table = 'filières';
    protected $primaryKey = 'id_filière';
    
    protected $fillable = [
        'nom'
    ];

    public function classes()
    {
        return $this->hasMany(Classe::class, 'id_filière');
    }
}
