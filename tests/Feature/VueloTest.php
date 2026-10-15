<?php

use App\Models\Escenario2\CompaniaAerea;
use App\Models\Escenario2\Avion;
use App\Models\Escenario2\Aeropuerto;
use App\Models\Escenario2\Vuelo;

test('puede instanciar la clase Vuelo con sus asociaciones unidireccionales y bidireccionales', function () {
    $compania = new CompaniaAerea('Sansa Airlines');
    $avion = new Avion('TI-ABC', 'Cessna 208B', $compania);

    $origen = new Aeropuerto('LIR', 'Daniel Oduber Quirós', 'Liberia');
    $destino = new Aeropuerto('SJO', 'Juan Santamaría', 'Alajuela');

    $vuelo = new Vuelo(101, $avion, $origen, $destino);

    expect($vuelo->getNumeroVuelo())->toBe(101)
        ->and($vuelo->getOrigen()->getCodigo())->toBe('LIR')
        ->and($vuelo->getDestino()->getCodigo())->toBe('SJO')
        ->and($vuelo->getAvion()->getMatricula())->toBe('TI-ABC')
        ->and($avion->getCompaniaAerea()->getNombre())->toBe('Sansa Airlines')
        ->and($avion->getVuelos())->toContain($vuelo);
});