<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Grupo extends Model
{
    protected $fillable = ['curso_id', 'docente_id', 'numero', 'cupo'];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }

    // Unidireccional: el grupo conoce a su docente, el docente no conoce sus grupos
    public function docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class);
    }

    public function estudiantes(): BelongsToMany
    {
        return $this->belongsToMany(Estudiante::class, 'matriculas')
            ->using(Matricula::class)
            ->withPivot('id', 'fecha', 'nota_final')
            ->withTimestamps();
    }

    public function asignarDocente(Docente $docente): void
    {
        $this->docente()->associate($docente);
        $this->save();
    }

    public function matricular(Estudiante $estudiante, string $fecha): void
    {
        $this->estudiantes()->attach($estudiante->id, ['fecha' => $fecha]);
    }
}
