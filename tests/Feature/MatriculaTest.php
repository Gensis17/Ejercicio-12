<?php

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Grupo;
use App\Models\Matricula;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('crea un grupo con dos estudiantes matriculados', function () {
    $curso   = Curso::create(['codigo' => 'IF4101', 'nombre' => 'Programación II']);
    $docente = Docente::create(['nombre' => 'Laura Méndez']);

    $grupo = $curso->agregarGrupo(1, 30);
    $grupo->asignarDocente($docente);

    $ana  = Estudiante::create(['carne' => 'C10001', 'nombre' => 'Ana Solís']);
    $luis = Estudiante::create(['carne' => 'C10002', 'nombre' => 'Luis Mora']);

    $grupo->matricular($ana, '2026-07-20');
    $grupo->matricular($luis, '2026-07-21');

    $matricula = Matricula::where('grupo_id', $grupo->id)
        ->where('estudiante_id', $ana->id)
        ->first();
    $matricula->asignarNota(8.5);

    $grupo->refresh();

    expect($grupo->estudiantes)->toHaveCount(2)
        ->and($grupo->curso->codigo)->toBe('IF4101')
        ->and($grupo->docente->nombre)->toBe('Laura Méndez')
        ->and(Matricula::find($matricula->id)->nota_final)->toBe('8.50')
        ->and($ana->grupos)->toHaveCount(1);
});

it('borra los grupos y matrículas al borrar el curso', function () {
    $curso = Curso::create(['codigo' => 'IF4101', 'nombre' => 'Programación II']);
    $grupo = $curso->agregarGrupo(1, 30);
    $grupo->matricular(
        Estudiante::create(['carne' => 'C10001', 'nombre' => 'Ana Solís']),
        '2026-07-20'
    );

    $curso->delete();

    expect(Grupo::count())->toBe(0)
        ->and(Matricula::count())->toBe(0)
        ->and(Estudiante::count())->toBe(1);
});