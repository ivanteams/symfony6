<?php

namespace App\Entity;

use App\Repository\ClubesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubesRepository::class)]
class Clubes
{


    #[ORM\Id]
    #[ORM\Column(length: 9)]
    private ?string $cif = null;

    #[ORM\Column(length: 45)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fundacion = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $num_socios = null;

    #[ORM\Column(length: 45)]
    private ?string $estadio = null;

    #[ORM\OneToMany(mappedBy: 'clubes_cif', targetEntity: Entrenadores::class)]
    private Collection $entrenadores;

    #[ORM\OneToMany(mappedBy: 'clubes_cif', targetEntity: Jugadores::class)]
    private Collection $jugadores;

    #[ORM\OneToMany(mappedBy: 'clubes_cif_local', targetEntity: Partidos::class)]
    private Collection $partidos;

    public function __construct()
    {
        $this->entrenadores = new ArrayCollection();
        $this->jugadores = new ArrayCollection();
        $this->partidos = new ArrayCollection();
    }


    public function getCif(): ?string
    {
        return $this->cif;
    }

    public function setCif(string $cif): static
    {
        $this->cif = $cif;

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

    public function getFundacion(): ?\DateTimeInterface
    {
        return $this->fundacion;
    }

    public function setFundacion(\DateTimeInterface $fundacion): static
    {
        $this->fundacion = $fundacion;

        return $this;
    }

    public function getNumSocios(): ?int
    {
        return $this->num_socios;
    }

    public function setNumSocios(int $num_socios): static
    {
        $this->num_socios = $num_socios;

        return $this;
    }

    public function getEstadio(): ?string
    {
        return $this->estadio;
    }

    public function setEstadio(string $estadio): static
    {
        $this->estadio = $estadio;

        return $this;
    }

    /**
     * @return Collection<int, Entrenadores>
     */
    public function getEntrenadores(): Collection
    {
        return $this->entrenadores;
    }

    public function addEntrenadore(Entrenadores $entrenadore): static
    {
        if (!$this->entrenadores->contains($entrenadore)) {
            $this->entrenadores->add($entrenadore);
            $entrenadore->setClubesCif($this);
        }

        return $this;
    }

    public function removeEntrenadore(Entrenadores $entrenadore): static
    {
        if ($this->entrenadores->removeElement($entrenadore)) {
            // set the owning side to null (unless already changed)
            if ($entrenadore->getClubesCif() === $this) {
                $entrenadore->setClubesCif(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Jugadores>
     */
    public function getJugadores(): Collection
    {
        return $this->jugadores;
    }

    public function addJugadore(Jugadores $jugadore): static
    {
        if (!$this->jugadores->contains($jugadore)) {
            $this->jugadores->add($jugadore);
            $jugadore->setClubesCif($this);
        }

        return $this;
    }

    public function removeJugadore(Jugadores $jugadore): static
    {
        if ($this->jugadores->removeElement($jugadore)) {
            // set the owning side to null (unless already changed)
            if ($jugadore->getClubesCif() === $this) {
                $jugadore->setClubesCif(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Partidos>
     */
    public function getPartidos(): Collection
    {
        return $this->partidos;
    }

    public function addPartido(Partidos $partido): static
    {
        if (!$this->partidos->contains($partido)) {
            $this->partidos->add($partido);
            $partido->setClubesCifLocal($this);
        }

        return $this;
    }

    public function removePartido(Partidos $partido): static
    {
        if ($this->partidos->removeElement($partido)) {
            // set the owning side to null (unless already changed)
            if ($partido->getClubesCifLocal() === $this) {
                $partido->setClubesCifLocal(null);
            }
        }

        return $this;
    }
}
