<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Matricula extends Pivot
{
     protected $table = 'matriculas';

    public $incrementing = true;

    protected $fillable = ['estudiante_id', 'grupo_id', 'fecha', 'nota_final'];

    protected $casts = [
        'fecha'      => 'date',
        'nota_final' => 'decimal:2',
    ];

    public function asignarNota(float $nota): void
    {
        $this->nota_final = $nota;
        $this->save();
    }
}
