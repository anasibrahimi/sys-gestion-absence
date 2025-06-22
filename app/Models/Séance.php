<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Séance extends Model
{
    protected $table = 'séances';
    protected $primaryKey = 'id_séance';
    
    protected $fillable = [
        'date',
        'time',
        'id_module'
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'id_séance');
    }
}
