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

    public function __construct()
    {
        $this->entrenadores = new ArrayCollection();
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
}
