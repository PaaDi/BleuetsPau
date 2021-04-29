<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNaissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numero;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="joueurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Equipe;

    /**
     * @ORM\OneToMany(targetEntity=RecevoirCarton::class, mappedBy="Joueur")
     */
    private $recevoirCartons;

    /**
     * @ORM\OneToMany(targetEntity=Jouer::class, mappedBy="idJoueur")
     */
    private $ListeMatchs;

    /**
     * @ORM\OneToMany(targetEntity=MarquerBut::class, mappedBy="idJoueur")
     */
    private $ListeButs;

    /**
     * @ORM\ManyToOne(targetEntity=RoleJoueur::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $role;

    public function __construct()
    {
        $this->recevoirCartons = new ArrayCollection();
        $this->ListeMatchs = new ArrayCollection();
        $this->ListeButs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->DateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $DateNaissance): self
    {
        $this->DateNaissance = $DateNaissance;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->Numero;
    }

    public function setNumero(int $Numero): self
    {
        $this->Numero = $Numero;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->Equipe;
    }

    public function setEquipe(?Equipe $Equipe): self
    {
        $this->Equipe = $Equipe;

        return $this;
    }

    /**
     * @return Collection|RecevoirCarton[]
     */
    public function getRecevoirCartons(): Collection
    {
        return $this->recevoirCartons;
    }

    public function addRecevoirCarton(RecevoirCarton $recevoirCarton): self
    {
        if (!$this->recevoirCartons->contains($recevoirCarton)) {
            $this->recevoirCartons[] = $recevoirCarton;
            $recevoirCarton->setJoueur($this);
        }

        return $this;
    }

    public function removeRecevoirCarton(RecevoirCarton $recevoirCarton): self
    {
        if ($this->recevoirCartons->removeElement($recevoirCarton)) {
            // set the owning side to null (unless already changed)
            if ($recevoirCarton->getJoueur() === $this) {
                $recevoirCarton->setJoueur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Jouer[]
     */
    public function getListeMatchs(): Collection
    {
        return $this->ListeMatchs;
    }

    public function addListeMatch(Jouer $listeMatch): self
    {
        if (!$this->ListeMatchs->contains($listeMatch)) {
            $this->ListeMatchs[] = $listeMatch;
            $listeMatch->setIdJoueur($this);
        }

        return $this;
    }

    public function removeListeMatch(Jouer $listeMatch): self
    {
        if ($this->ListeMatchs->removeElement($listeMatch)) {
            // set the owning side to null (unless already changed)
            if ($listeMatch->getIdJoueur() === $this) {
                $listeMatch->setIdJoueur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MarquerBut[]
     */
    public function getListeButs(): Collection
    {
        return $this->ListeButs;
    }

    public function addListeBut(MarquerBut $listeBut): self
    {
        if (!$this->ListeButs->contains($listeBut)) {
            $this->ListeButs[] = $listeBut;
            $listeBut->setIdJoueur($this);
        }

        return $this;
    }

    public function removeListeBut(MarquerBut $listeBut): self
    {
        if ($this->ListeButs->removeElement($listeBut)) {
            // set the owning side to null (unless already changed)
            if ($listeBut->getIdJoueur() === $this) {
                $listeBut->setIdJoueur(null);
            }
        }

        return $this;
    }

        public function __toString()
        {
            return $this->getNom() . " " . $this->getPrenom();
        }

        public function getRole(): ?RoleJoueur
        {
            return $this->role;
        }

        public function setRole(?RoleJoueur $role): self
        {
            $this->role = $role;

            return $this;
        }


}
