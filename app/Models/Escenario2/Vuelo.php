<?php

namespace App\Models\Escenario2;

class Vuelo
{
    private int $numeroVuelo;
    private Avion $avion;           // Multiplicidad 1 (asignado - Bidireccional)
    private Aeropuerto $origen;     // Multiplicidad 1 (origen - Unidireccional)
    private Aeropuerto $destino;    // Multiplicidad 1 (destino - Unidireccional)

    public function __construct(int $numeroVuelo, Avion $avion, Aeropuerto $origen, Aeropuerto $destino)
    {
        $this->numeroVuelo = $numeroVuelo;
        $this->avion = $avion;
        $this->origen = $origen;
        $this->destino = $destino;

        // Mantiene la bidireccionalidad registrando el vuelo en el avión
        $avion->asignarVuelo($this);
    }

    public function getNumeroVuelo(): int
    {
        return $this->numeroVuelo;
    }

    public function getAvion(): Avion
    {
        return $this->avion;
    }

    public function getOrigen(): Aeropuerto
    {
        return $this->origen;
    }

    public function getDestino(): Aeropuerto
    {
        return $this->destino;
    }
}