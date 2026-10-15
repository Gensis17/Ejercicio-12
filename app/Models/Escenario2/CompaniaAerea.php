<?php

namespace App\Models\Escenario2;

class CompaniaAerea
{
    private string $nombre;
    /** @var Avion[] */
    private array $aviones = []; // Multiplicidad 0..* (maneja)

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function agregarAvion(Avion $avion): void
    {
        if (!in_array($avion, $this->aviones, true)) {
            $this->aviones[] = $avion;
            $avion->setCompaniaAerea($this); // Mantiene la bidireccionalidad
        }
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /** @return Avion[] */
    public function getAviones(): array
    {
        return $this->aviones;
    }
}