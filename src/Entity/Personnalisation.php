<?php

namespace App\Entity;

use App\Repository\PersonnalisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnalisationRepository::class)
 */
class Personnalisation
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero_whatsapp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $messages;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at_messages;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumeroWhatsapp(): ?string
    {
        return $this->numero_whatsapp;
    }

    public function setNumeroWhatsapp(string $numero_whatsapp): self
    {
        $this->numero_whatsapp = $numero_whatsapp;

        return $this;
    }

    public function getMessages(): ?string
    {
        return $this->messages;
    }

    public function setMessages(string $messages): self
    {
        $this->messages = $messages;

        return $this;
    }


}
