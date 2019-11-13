<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideosRepository")
 */
class Videos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $vi_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vi_desc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vi_path;

    /**
     * @ORM\Column(type="integer")
     */
    private $vi_trick_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getViName(): ?string
    {
        return $this->vi_name;
    }

    public function setViName(string $vi_name): self
    {
        $this->vi_name = $vi_name;

        return $this;
    }

    public function getViDesc(): ?string
    {
        return $this->vi_desc;
    }

    public function setViDesc(string $vi_desc): self
    {
        $this->vi_desc = $vi_desc;

        return $this;
    }

    public function getViPath(): ?string
    {
        return $this->vi_path;
    }

    public function setViPath(string $vi_path): self
    {
        $this->vi_path = $vi_path;

        return $this;
    }

    public function getViTrickId(): ?int
    {
        return $this->vi_trick_id;
    }

    public function setViTrickId(int $vi_trick_id): self
    {
        $this->vi_trick_id = $vi_trick_id;

        return $this;
    }
}
