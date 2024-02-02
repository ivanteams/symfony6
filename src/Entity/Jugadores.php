<?php

namespace App\Entity;

use App\Repository\JugadoresRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JugadoresRepository::class)]
class Jugadores
{

    #[ORM\Id]
    #[ORM\Column(length: 9)]
    private ?string $nif_nie = null;

    #[ORM\Column(length: 45)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $edad = null;

    #[ORM\Column(nullable: true)]
    private ?bool $cedido = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2, nullable: true)]
    private ?string $ficha = null;

    #[ORM\ManyToOne(inversedBy: 'jugadores')]
    #[ORM\JoinColumn(name: "clubes_cif", referencedColumnName: "cif", nullable: false)]
    private ?Clubes $clubes_cif = null;

    #[ORM\ManyToOne(inversedBy: 'jugadores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Posiciones $posiciones = null;


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

    public function setEdad(int $edad): static
    {
        $this->edad = $edad;

        return $this;
    }

    public function isCedido(): ?bool
    {
        return $this->cedido;
    }

    public function setCedido(?bool $cedido): static
    {
        $this->cedido = $cedido;

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

    public function getPosicionesId(): ?Posiciones
    {
        return $this->posiciones;
    }

    public function setPosicionesId(?Posiciones $posiciones_id): static
    {
        $this->posiciones = $posiciones_id;

        return $this;
    }
}
