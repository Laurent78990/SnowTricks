<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 */
class Media
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
    private $md_trick_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $md_auth_id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $md_type;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $md_name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $md_desc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $md_path;

    /**
     * @ORM\Column(type="datetime")
     */
    private $md_crea_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMdTrickId(): ?int
    {
        return $this->md_trick_id;
    }

    public function setMdTrickId(int $md_trick_id): self
    {
        $this->md_trick_id = $md_trick_id;

        return $this;
    }

    public function getMdAuthId(): ?int
    {
        return $this->md_auth_id;
    }

    public function setMdAuthId(?int $md_auth_id): self
    {
        $this->md_auth_id = $md_auth_id;

        return $this;
    }

    public function getMdType(): ?string
    {
        return $this->md_type;
    }

    public function setMdType(string $md_type): self
    {
        $this->md_type = $md_type;

        return $this;
    }

    public function getMdName(): ?string
    {
        return $this->md_name;
    }

    public function setMdName(string $md_name): self
    {
        $this->md_name = $md_name;

        return $this;
    }

    public function getMdDesc(): ?string
    {
        return $this->md_desc;
    }

    public function setMdDesc(string $md_desc): self
    {
        $this->md_desc = $md_desc;

        return $this;
    }

    public function getMdPath(): ?string
    {
        return $this->md_path;
    }

    public function setMdPath(string $md_path): self
    {
        $this->md_path = $md_path;

        return $this;
    }

    public function getMdCreaDate(): ?\DateTimeInterface
    {
        return $this->md_crea_date;
    }

    public function setMdCreaDate(\DateTimeInterface $md_crea_date): self
    {
        $this->md_crea_date = $md_crea_date;

        return $this;
    }
}
