<?php

namespace App\Entity;

use App\Repository\UtentiRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtentiRepository::class)
 */
class Utenti
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
     * @ORM\Column()
     */
    private $cognome;
    
    /**
     * @ORM\Column(unique=true)
     */
    private $email;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gruppo", inversedBy="utenti")
     */ 
    private $gruppo;

    public function getId()
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

    public function getCognome()
    {
        return $this->cognome;
    }
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getGruppo()
    {
        return $this->gruppo;
    }
    public function setGruppo($gruppo)
    {
        $this->gruppo = $gruppo;
    }

}
