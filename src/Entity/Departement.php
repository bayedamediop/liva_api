<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
class Departement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *  @Groups({"region:read_all"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"region:read_all"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"region:read_all"})
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity=Region::class, inversedBy="departements")
     * 
     */
    private $region;

    /**
     * @ORM\OneToMany(targetEntity=Commun::class, mappedBy="departement")
     *  @Groups({"region:read_all"})
     */
    private $communs;

    public function __construct()
    {
        $this->communs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return Collection|Commun[]
     */
    public function getCommuns(): Collection
    {
        return $this->communs;
    }

    public function addCommun(Commun $commun): self
    {
        if (!$this->communs->contains($commun)) {
            $this->communs[] = $commun;
            $commun->setDepartement($this);
        }

        return $this;
    }

    public function removeCommun(Commun $commun): self
    {
        if ($this->communs->contains($commun)) {
            $this->communs->removeElement($commun);
            // set the owning side to null (unless already changed)
            if ($commun->getDepartement() === $this) {
                $commun->setDepartement(null);
            }
        }

        return $this;
    }
}
