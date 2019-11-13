<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RolesRepository")
 */
class Roles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $ro_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ro_desc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoName(): ?string
    {
        return $this->ro_name;
    }

    public function setRoName(string $ro_name): self
    {
        $this->ro_name = $ro_name;

        return $this;
    }

    public function getRoDesc(): ?string
    {
        return $this->ro_desc;
    }

    public function setRoDesc(?string $ro_desc): self
    {
        $this->ro_desc = $ro_desc;

        return $this;
    }
}
