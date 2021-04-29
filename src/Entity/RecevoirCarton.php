<?php

namespace App\Entity;

use App\Repository\RecevoirCartonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecevoirCartonRepository::class)
 */
class RecevoirCarton
{
    /**
     * @ORM\Column(type="string", length=5)
     */
    private $Couleur;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=FicheMatch::class, inversedBy="recevoirCartons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $FicheMatch;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Joueur::class, inversedBy="recevoirCartons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Joueur;

    public function getCouleur(): ?string
    {
        return $this->Couleur;
    }

    public function setCouleur(string $Couleur): self
    {
        $this->Couleur = $Couleur;

        return $this;
    }

    public function getFicheMatch(): ?FicheMatch
    {
        return $this->FicheMatch;
    }

    public function setFicheMatch(?FicheMatch $FicheMatch): self
    {
        $this->FicheMatch = $FicheMatch;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->Joueur;
    }

    public function setJoueur(?Joueur $Joueur): self
    {
        $this->Joueur = $Joueur;

        return $this;
    }
}
