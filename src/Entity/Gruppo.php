<?php

namespace App\Entity;

use App\Repository\GruppoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=GruppoRepository::class)
 */
class Gruppo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column()
     */
    private $nome;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utenti", mappedBy="gruppo")
     */    
    private $utenti;

    public function __construct()
    {
        $this->utenti = new ArrayCollection();
    }
        
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return Collection|Utenti[]
     */
    public function getUtenti(): Collection
    {
        return $this->utenti;
    }

    public function addUtenti(Utenti $utenti): self
    {
        if (!$this->utenti->contains($utenti)) {
            $this->utenti[] = $utenti;
            $utenti->setGruppo($this);
        }

        return $this;
    }

    public function __toString(){
        return $this->nome;
    }
}