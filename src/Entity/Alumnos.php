<?php

namespace App\Entity;

use App\Repository\AlumnosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlumnosRepository::class)]
#[ORM\Table(name: "alumnos", indexes: [new ORM\Index(name: "idx_nombre", columns: ["nombre"])])]
class Alumnos
{

    #[ORM\Id]
    #[ORM\Column(length: 9)]
    private ?string $nif = null;

    #[ORM\Column(length: 45)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $edad = null;

    #[ORM\Column]
    private ?bool $sexo = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fechanac = null;

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(string $nif): static
    {
        $this->nif = $nif;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): static
    {
        $this->edad = $edad;

        return $this;
    }

    public function isSexo(): ?bool
    {
        return $this->sexo;
    }

    public function setSexo(bool $sexo): static
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getFechanac(): ?\DateTimeInterface
    {
        return $this->fechanac;
    }

    public function setFechanac(\DateTimeInterface $fechanac): static
    {
        $this->fechanac = $fechanac;

        return $this;
    }
}
