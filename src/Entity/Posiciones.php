<?php

namespace App\Entity;

use App\Repository\PosicionesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PosicionesRepository::class)]
class Posiciones
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 45)]
    private ?string $posicion = null;

    #[ORM\OneToMany(mappedBy: 'posiciones_id', targetEntity: Jugadores::class)]
    private Collection $jugadores;

    public function __construct()
    {
        $this->jugadores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosicion(): ?string
    {
        return $this->posicion;
    }

    public function setPosicion(string $posicion): static
    {
        $this->posicion = $posicion;

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
            $jugadore->setPosicionesId($this);
        }

        return $this;
    }

    public function removeJugadore(Jugadores $jugadore): static
    {
        if ($this->jugadores->removeElement($jugadore)) {
            // set the owning side to null (unless already changed)
            if ($jugadore->getPosicionesId() === $this) {
                $jugadore->setPosicionesId(null);
            }
        }

        return $this;
    }
}
