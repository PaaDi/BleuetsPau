<?php

namespace App\Entity;

use App\Repository\PlacementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlacementRepository::class)
 */
class Placement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Libelle;

    /**
     * @ORM\OneToMany(targetEntity=Jouer::class, mappedBy="idPlacement")
     */
    private $ListeJoueursPlacementParMatch;

    public function __construct()
    {
        $this->ListeJoueursPlacementParMatch = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    /**
     * @return Collection|Jouer[]
     */
    public function getListeJoueursPlacementParMatch(): Collection
    {
        return $this->ListeJoueursPlacementParMatch;
    }

    public function addListeJoueursPlacementParMatch(Jouer $listeJoueursPlacementParMatch): self
    {
        if (!$this->ListeJoueursPlacementParMatch->contains($listeJoueursPlacementParMatch)) {
            $this->ListeJoueursPlacementParMatch[] = $listeJoueursPlacementParMatch;
            $listeJoueursPlacementParMatch->setIdPlacement($this);
        }

        return $this;
    }

    public function removeListeJoueursPlacementParMatch(Jouer $listeJoueursPlacementParMatch): self
    {
        if ($this->ListeJoueursPlacementParMatch->removeElement($listeJoueursPlacementParMatch)) {
            // set the owning side to null (unless already changed)
            if ($listeJoueursPlacementParMatch->getIdPlacement() === $this) {
                $listeJoueursPlacementParMatch->setIdPlacement(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getLibelle();
    }
}
