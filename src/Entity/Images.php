<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images
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
    private $im_name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $im_desc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $im_path;

    /**
     * @ORM\Column(type="integer")
     */
    private $im_trick_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImName(): ?string
    {
        return $this->im_name;
    }

    public function setImName(string $im_name): self
    {
        $this->im_name = $im_name;

        return $this;
    }

    public function getImDesc(): ?string
    {
        return $this->im_desc;
    }

    public function setImDesc(?string $im_desc): self
    {
        $this->im_desc = $im_desc;

        return $this;
    }

    public function getImPath(): ?string
    {
        return $this->im_path;
    }

    public function setImPath(string $im_path): self
    {
        $this->im_path = $im_path;

        return $this;
    }

    public function getImTrickId(): ?int
    {
        return $this->im_trick_id;
    }

    public function setImTrickId(int $im_trick_id): self
    {
        $this->im_trick_id = $im_trick_id;

        return $this;
    }
}
