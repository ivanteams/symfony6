<?php

namespace App\Entity;

use App\Repository\PartidosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartidosRepository::class)]
class Partidos
{

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'partidos')]
    #[ORM\JoinColumn(name: "clubes_cif_local", referencedColumnName: "cif", nullable: false)]
    private ?Clubes $clubes_cif_local = null;

    #[ORM\Id]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "clubes_cif_visitante", referencedColumnName: "cif", nullable: false)]
    private ?Clubes $clubes_cif_visitante = null;


    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $goles_local = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $goles_visitante = null;

    #[ORM\Column(length: 45)]
    private ?string $arbitro = null;



    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getGolesLocal(): ?int
    {
        return $this->goles_local;
    }

    public function setGolesLocal(int $goles_local): static
    {
        $this->goles_local = $goles_local;

        return $this;
    }

    public function getGolesVisitante(): ?int
    {
        return $this->goles_visitante;
    }

    public function setGolesVisitante(int $goles_visitante): static
    {
        $this->goles_visitante = $goles_visitante;

        return $this;
    }

    public function getArbitro(): ?string
    {
        return $this->arbitro;
    }

    public function setArbitro(string $arbitro): static
    {
        $this->arbitro = $arbitro;

        return $this;
    }

    public function getClubesCifLocal(): ?Clubes
    {
        return $this->clubes_cif_local;
    }

    public function setClubesCifLocal(?Clubes $clubes_cif_local): static
    {
        $this->clubes_cif_local = $clubes_cif_local;

        return $this;
    }

    public function getClubesCifVisitante(): ?Clubes
    {
        return $this->clubes_cif_visitante;
    }

    public function setClubesCifVisitante(?Clubes $clubes_cif_visitante): static
    {
        $this->clubes_cif_visitante = $clubes_cif_visitante;

        return $this;
    }
}
