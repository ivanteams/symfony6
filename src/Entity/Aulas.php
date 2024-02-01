<?php

namespace App\Entity;

use App\Repository\AulasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AulasRepository::class)]
#[ORM\Table(name: "aulas", indexes: [new ORM\Index(name: "idx_docente", columns: ["docente"])])]
class Aulas
{

    #[ORM\Id]
    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $num_aula = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $capacidad = null;


    #[ORM\Column(length: 45)]
    private ?string $docente = null;

    #[ORM\Column]
    private ?bool $hardware = null;

    #[ORM\OneToMany(mappedBy: 'aulas_numAula', targetEntity: Alumnos::class)]
    private Collection $alumnos;

    public function __construct()
    {
        $this->alumnos = new ArrayCollection();
    }

    public function getNumAula(): ?int
    {
        return $this->num_aula;
    }

    public function setNumAula(int $numAula): static
    {
        $this->num_aula = $numAula;

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

    /**
     * @return Collection<int, Alumnos>
     */
    public function getAlumnos(): Collection
    {
        return $this->alumnos;
    }

    public function addAlumno(Alumnos $alumno): static
    {
        if (!$this->alumnos->contains($alumno)) {
            $this->alumnos->add($alumno);
            $alumno->setAulasNumAula($this);
        }

        return $this;
    }

    public function removeAlumno(Alumnos $alumno): static
    {
        if ($this->alumnos->removeElement($alumno)) {
            // set the owning side to null (unless already changed)
            if ($alumno->getAulasNumAula() === $this) {
                $alumno->setAulasNumAula(null);
            }
        }

        return $this;
    }
}
