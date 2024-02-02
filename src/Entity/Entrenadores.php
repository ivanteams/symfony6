<?php

namespace App\Entity;

use App\Repository\EntrenadoresRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrenadoresRepository::class)]
class Entrenadores
{

    #[ORM\Id]
    #[ORM\Column(length: 9)]
    private ?string $nif_nie = null;

    #[ORM\Column(length: 45)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $edad = null;

    #[ORM\Column(nullable: true)]
    private ?bool $destituido = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2, nullable: true)]
    private ?string $ficha = null;

    #[ORM\ManyToOne(inversedBy: 'entrenadores')]
    #[ORM\JoinColumn(name: "clubes_cif", referencedColumnName: "cif", nullable: false)]
    private ?Clubes $clubes_cif = null;


    public function getNifNie(): ?string
    {
        return $this->nif_nie;
    }

    public function setNifNie(string $nif_nie): static
    {
        $this->nif_nie = $nif_nie;

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

    public function setEdad(?int $edad): static
    {
        $this->edad = $edad;

        return $this;
    }

    public function isDestituido(): ?bool
    {
        return $this->destituido;
    }

    public function setDestituido(bool $destituido): static
    {
        $this->destituido = $destituido;

        return $this;
    }

    public function getFicha(): ?string
    {
        return $this->ficha;
    }

    public function setFicha(?string $ficha): static
    {
        $this->ficha = $ficha;

        return $this;
    }

    public function getClubesCif(): ?Clubes
    {
        return $this->clubes_cif;
    }

    public function setClubesCif(?Clubes $clubes_cif): static
    {
        $this->clubes_cif = $clubes_cif;

        return $this;
    }
}
