<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Estudiante extends Model
{
    protected $fillable = ['carne', 'nombre'];

    public function grupos(): BelongsToMany
    {
        return $this->belongsToMany(Grupo::class, 'matriculas')
            ->using(Matricula::class)
            ->withPivot('id', 'fecha', 'nota_final')
            ->withTimestamps();
    }
}
