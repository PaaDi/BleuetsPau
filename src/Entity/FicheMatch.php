<?php

namespace App\Entity;

use App\Repository\FicheMatchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheMatchRepository::class)
 */
class FicheMatch
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDebut;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $Stade;

    /**
     * @ORM\OneToMany(targetEntity=RecevoirCarton::class, mappedBy="FicheMatch")
     */
    private $recevoirCartons;

    /**
     * @ORM\OneToMany(targetEntity=Jouer::class, mappedBy="idFicheMatch")
     */
    private $ListeJoueur;

    /**
     * @ORM\OneToMany(targetEntity=MarquerBut::class, mappedBy="idFicheMatch")
     */
    private $ListeButs;

    /**
     * @ORM\ManyToOne(targetEntity=Arbitre::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ArbitrePrincipal;

    /**
     * @ORM\ManyToOne(targetEntity=Arbitre::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ArbitreAssistant1;

    /**
     * @ORM\ManyToOne(targetEntity=Arbitre::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $ArbitreAssistant2;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $EquipeDomicile;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $EquipeExterieure;

    /**
     * @ORM\ManyToOne(targetEntity=StatusFiche::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $score;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buteur;

    public function __construct()
    {
        $this->recevoirCartons = new ArrayCollection();
        $this->ListeJoueur = new ArrayCollection();
        $this->ListeButs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
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

    public function getStade(): ?string
    {
        return $this->Stade;
    }

    public function setStade(string $Stade): self
    {
        $this->Stade = $Stade;

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
            $recevoirCarton->setFicheMatch($this);
        }

        return $this;
    }

    public function removeRecevoirCarton(RecevoirCarton $recevoirCarton): self
    {
        if ($this->recevoirCartons->removeElement($recevoirCarton)) {
            // set the owning side to null (unless already changed)
            if ($recevoirCarton->getFicheMatch() === $this) {
                $recevoirCarton->setFicheMatch(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Jouer[]
     */
    public function getListeJoueur(): Collection
    {
        return $this->ListeJoueur;
    }

    public function addListeJoueur(Jouer $listeJoueur): self
    {
        if (!$this->ListeJoueur->contains($listeJoueur)) {
            $this->ListeJoueur[] = $listeJoueur;
            $listeJoueur->setIdFicheMatch($this);
        }

        return $this;
    }

    public function removeListeJoueur(Jouer $listeJoueur): self
    {
        if ($this->ListeJoueur->removeElement($listeJoueur)) {
            // set the owning side to null (unless already changed)
            if ($listeJoueur->getIdFicheMatch() === $this) {
                $listeJoueur->setIdFicheMatch(null);
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
            $listeBut->setIdFicheMatch($this);
        }

        return $this;
    }

    public function removeListeBut(MarquerBut $listeBut): self
    {
        if ($this->ListeButs->removeElement($listeBut)) {
            // set the owning side to null (unless already changed)
            if ($listeBut->getIdFicheMatch() === $this) {
                $listeBut->setIdFicheMatch(null);
            }
        }

        return $this;
    }

    public function getArbitrePrincipal(): ?Arbitre
    {
        return $this->ArbitrePrincipal;
    }

    public function setArbitrePrincipal(?Arbitre $ArbitrePrincipal): self
    {
        $this->ArbitrePrincipal = $ArbitrePrincipal;

        return $this;
    }

    public function getArbitreAssistant1(): ?Arbitre
    {
        return $this->ArbitreAssistant1;
    }

    public function setArbitreAssistant1(?Arbitre $ArbitreAssistant1): self
    {
        $this->ArbitreAssistant1 = $ArbitreAssistant1;

        return $this;
    }

    public function getArbitreAssistant2(): ?Arbitre
    {
        return $this->ArbitreAssistant2;
    }

    public function setArbitreAssistant2(?Arbitre $ArbitreAssistant2): self
    {
        $this->ArbitreAssistant2 = $ArbitreAssistant2;

        return $this;
    }

    public function getEquipeDomicile(): ?Equipe
    {
        return $this->EquipeDomicile;
    }

    public function setEquipeDomicile(?Equipe $EquipeDomicile): self
    {
        $this->EquipeDomicile = $EquipeDomicile;

        return $this;
    }

    public function getEquipeExterieure(): ?Equipe
    {
        return $this->EquipeExterieure;
    }

    public function setEquipeExterieure(?Equipe $EquipeExterieure): self
    {
        $this->EquipeExterieure = $EquipeExterieure;

        return $this;
    }

    public function getStatus(): ?StatusFiche
    {
        return $this->status;
    }

    public function setStatus(?StatusFiche $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getButeur(): ?string
    {
        return $this->buteur;
    }

    public function setButeur(?string $buteur): self
    {
        $this->buteur = $buteur;

        return $this;
    }


}
