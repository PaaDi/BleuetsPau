<?php

namespace App\Entity;

use App\Repository\JouerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JouerRepository::class)
 */
class Jouer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FicheMatch::class, inversedBy="ListeJoueur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idFicheMatch;

    /**
     * @ORM\ManyToOne(targetEntity=Joueur::class, inversedBy="ListeMatchs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idJoueur;

    /**
     * @ORM\ManyToOne(targetEntity=Placement::class, inversedBy="ListeJoueursPlacementParMatch")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPlacement;

    /**
     * @ORM\ManyToOne(targetEntity=Poste::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPoste;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idRole;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdPlacement(): ?Placement
    {
        return $this->idPlacement;
    }

    public function setIdPlacement(?Placement $idPlacement): self
    {
        $this->idPlacement = $idPlacement;

        return $this;
    }

    public function getIdPoste(): ?Poste
    {
        return $this->idPoste;
    }

    public function setIdPoste(?Poste $idPoste): self
    {
        $this->idPoste = $idPoste;

        return $this;
    }

    public function getIdRole(): ?Role
    {
        return $this->idRole;
    }

    public function setIdRole(?Role $idRole): self
    {
        $this->idRole = $idRole;

        return $this;
    }


}
