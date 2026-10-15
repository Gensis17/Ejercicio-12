<?php

namespace App\Models\Escenario2;

class Avion
{
    private string $matricula;
    private string $modelo;
    private ?CompaniaAerea $companiaAerea = null; // Multiplicidad 1 (Bidireccional)
    /** @var Vuelo[] */
    private array $vuelos = [];                   // Multiplicidad 0..* (Bidireccional)

    public function __construct(string $matricula, string $modelo, ?CompaniaAerea $companiaAerea = null)
    {
        $this->matricula = $matricula;
        $this->modelo = $modelo;

        if ($companiaAerea !== null) {
            $companiaAerea->agregarAvion($this);
        }
    }

    public function setCompaniaAerea(CompaniaAerea $companiaAerea): void
    {
        $this->companiaAerea = $companiaAerea;
    }

    public function getCompaniaAerea(): ?CompaniaAerea
    {
        return $this->companiaAerea;
    }

    public function asignarVuelo(Vuelo $vuelo): void
    {
        if (!in_array($vuelo, $this->vuelos, true)) {
            $this->vuelos[] = $vuelo;
        }
    }

    public function getMatricula(): string
    {
        return $this->matricula;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    /** @return Vuelo[] */
    public function getVuelos(): array
    {
        return $this->vuelos;
    }
}