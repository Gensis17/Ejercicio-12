<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curso extends Model
{
      protected $fillable = ['codigo', 'nombre'];

    // Composición: el curso conoce y crea sus grupos
    public function grupos(): HasMany
    {
        return $this->hasMany(Grupo::class);
    }

    public function agregarGrupo(int $numero, int $cupo): Grupo
    {
        return $this->grupos()->create([
            'numero' => $numero,
            'cupo'   => $cupo,
        ]);
    }
}
