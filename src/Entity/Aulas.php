<?php

namespace App\Entity;

use App\Repository\AulasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AulasRepository::class)]
class Aulas
{

    #[ORM\Id]
    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $numAula = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $capacidad = null;

    #[ORM\Index]
    #[ORM\Column(length: 45)]
    private ?string $docente = null;

    #[ORM\Column]
    private ?bool $hardware = null;


    public function getNumAula(): ?int
    {
        return $this->numAula;
    }

    public function setNumAula(int $numAula): static
    {
        $this->numAula = $numAula;

        return $this;
    }

    public function getCapacidad(): ?int
    {
        return $this->capacidad;
    }

    public function setCapacidad(int $capacidad): static
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    public function getDocente(): ?string
    {
        return $this->docente;
    }

    public function setDocente(string $docente): static
    {
        $this->docente = $docente;

        return $this;
    }

    public function isHardware(): ?bool
    {
        return $this->hardware;
    }

    public function setHardware(bool $hardware): static
    {
        $this->hardware = $hardware;

        return $this;
    }






}
