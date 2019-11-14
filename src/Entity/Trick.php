<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrickRepository")
 */
class Trick
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $group_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $crea_date;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $crea_author;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGroupId(): ?int
    {
        return $this->group_id;
    }

    public function setGroupId(int $group_id): self
    {
        $this->group_id = $group_id;

        return $this;
    }

    public function getCreaDate(): ?\DateTimeInterface
    {
        return $this->crea_date;
    }

    public function setCreaDate(\DateTimeInterface $crea_date): self
    {
        $this->crea_date = $crea_date;

        return $this;
    }

    public function getCreaAuthor(): ?string
    {
        return $this->crea_author;
    }

    public function setCreaAuthor(string $crea_author): self
    {
        $this->crea_author = $crea_author;

        return $this;
    }

}
