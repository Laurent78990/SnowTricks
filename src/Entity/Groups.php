<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupsRepository")
 */
class Groups
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
    private $gr_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gr_desc;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gr_active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrName(): ?string
    {
        return $this->gr_name;
    }

    public function setGrName(string $gr_name): self
    {
        $this->gr_name = $gr_name;

        return $this;
    }

    public function getGrDesc(): ?string
    {
        return $this->gr_desc;
    }

    public function setGrDesc(?string $gr_desc): self
    {
        $this->gr_desc = $gr_desc;

        return $this;
    }

    public function getGrActive(): ?bool
    {
        return $this->gr_active;
    }

    public function setGrActive(bool $gr_active): self
    {
        $this->gr_active = $gr_active;

        return $this;
    }
}
