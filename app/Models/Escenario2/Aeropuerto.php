<?php

namespace App\Models\Escenario2;

class Aeropuerto
{
    private string $codigo;
    private string $nombre;
    private string $ciudad;

    public function __construct(string $codigo, string $nombre, string $ciudad)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getCiudad(): string
    {
        return $this->ciudad;
    }
}