<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrgroupRepository")
 */
class Trgroup
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $gr_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gr_desc;

    /**
     * @ORM\Column(type="datetime")
     */
    private $gr_crea_date;

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

    public function getGrCreaDate(): ?\DateTimeInterface
    {
        return $this->gr_crea_date;
    }

    public function setGrCreaDate(\DateTimeInterface $gr_crea_date): self
    {
        $this->gr_crea_date = $gr_crea_date;

        return $this;
    }
}
