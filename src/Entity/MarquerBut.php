<?php

namespace App\Entity;

use App\Repository\MarquerButRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarquerButRepository::class)
 */
class MarquerBut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ContreSonCamp;

    /**
     * @ORM\Column(type="integer")
     */
    private $MinBut;

    /**
     * @ORM\ManyToOne(targetEntity=FicheMatch::class, inversedBy="ListeButs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idFicheMatch;

    /**
     * @ORM\ManyToOne(targetEntity=Joueur::class, inversedBy="ListeButs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idJoueur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContreSonCamp(): ?bool
    {
        return $this->ContreSonCamp;
    }

    public function setContreSonCamp(bool $ContreSonCamp): self
    {
        $this->ContreSonCamp = $ContreSonCamp;

        return $this;
    }

    public function getMinBut(): ?int
    {
        return $this->MinBut;
    }

    public function setMinBut(int $MinBut): self
    {
        $this->MinBut = $MinBut;

        return $this;
    }

    public function getIdFicheMatch(): ?FicheMatch
    {
        return $this->idFicheMatch;
    }

    public function setIdFicheMatch(?FicheMatch $idFicheMatch): self
    {
        $this->idFicheMatch = $idFicheMatch;

        return $this;
    }

    public function getIdJoueur(): ?Joueur
    {
        return $this->idJoueur;
    }

    public function setIdJoueur(?Joueur $idJoueur): self
    {
        $this->idJoueur = $idJoueur;

        return $this;
    }
}
