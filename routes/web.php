<?php

use Illuminate\Support\Facades\Route;
use App\Models\Escenario2\CompaniaAerea;
use App\Models\Escenario2\Avion;
use App\Models\Escenario2\Aeropuerto;
use App\Models\Escenario2\Vuelo;

Route::get('/', function () {
    return view('welcome');
    
});


Route::get('/escenario2', function () {
    $compania = new CompaniaAerea('Sansa Airlines');
    $avion = new Avion('TI-ABC', 'Cessna 208B', $compania);

    $origen = new Aeropuerto('LIR', 'Daniel Oduber Quirós', 'Liberia');
    $destino = new Aeropuerto('SJO', 'Juan Santamaría', 'Alajuela');

    // Instanciación de la clase Vuelo
    $vuelo = new Vuelo(101, $avion, $origen, $destino);

    return response()->json([
        'numeroVuelo' => $vuelo->getNumeroVuelo(),
        'compania' => $vuelo->getAvion()->getCompaniaAerea()->getNombre(),
        'avion' => $vuelo->getAvion()->getMatricula() . ' - ' . $vuelo->getAvion()->getModelo(),
        'origen' => $vuelo->getOrigen()->getCodigo() . ' (' . $vuelo->getOrigen()->getCiudad() . ')',
        'destino' => $vuelo->getDestino()->getCodigo() . ' (' . $vuelo->getDestino()->getCiudad() . ')',
    ]);
});