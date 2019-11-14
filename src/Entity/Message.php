<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $me_trick_id;

    /**
     * @ORM\Column(type="text")
     */
    private $me_text;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $me_author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $me_crea_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeTrickId(): ?int
    {
        return $this->me_trick_id;
    }

    public function setMeTrickId(int $me_trick_id): self
    {
        $this->me_trick_id = $me_trick_id;

        return $this;
    }

    public function getMeText(): ?string
    {
        return $this->me_text;
    }

    public function setMeText(string $me_text): self
    {
        $this->me_text = $me_text;

        return $this;
    }

    public function getMeAuthor(): ?string
    {
        return $this->me_author;
    }

    public function setMeAuthor(string $me_author): self
    {
        $this->me_author = $me_author;

        return $this;
    }

    public function getMeCreaDate(): ?\DateTimeInterface
    {
        return $this->me_crea_date;
    }

    public function setMeCreaDate(\DateTimeInterface $me_crea_date): self
    {
        $this->me_crea_date = $me_crea_date;

        return $this;
    }
}
