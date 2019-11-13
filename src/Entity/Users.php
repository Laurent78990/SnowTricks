<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
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
    private $us_first_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $us_last_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $us_role_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $us_photo_id;

    /**
     * @ORM\Column(type="date")
     */
    private $us_crea_date;

    /**
     * @ORM\Column(type="time")
     */
    private $us_crea_time;

    /**
     * @ORM\Column(type="date")
     */
    private $us_last_cnx;

    /**
     * @ORM\Column(type="boolean")
     */
    private $us_active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsFirstName(): ?string
    {
        return $this->us_first_name;
    }

    public function setUsFirstName(string $us_first_name): self
    {
        $this->us_first_name = $us_first_name;

        return $this;
    }

    public function getUsLastName(): ?string
    {
        return $this->us_last_name;
    }

    public function setUsLastName(string $us_last_name): self
    {
        $this->us_last_name = $us_last_name;

        return $this;
    }

    public function getUsRoleId(): ?int
    {
        return $this->us_role_id;
    }

    public function setUsRoleId(int $us_role_id): self
    {
        $this->us_role_id = $us_role_id;

        return $this;
    }

    public function getUsPhotoId(): ?int
    {
        return $this->us_photo_id;
    }

    public function setUsPhotoId(?int $us_photo_id): self
    {
        $this->us_photo_id = $us_photo_id;

        return $this;
    }

    public function getUsCreaDate(): ?\DateTimeInterface
    {
        return $this->us_crea_date;
    }

    public function setUsCreaDate(\DateTimeInterface $us_crea_date): self
    {
        $this->us_crea_date = $us_crea_date;

        return $this;
    }

    public function getUsCreaTime(): ?\DateTimeInterface
    {
        return $this->us_crea_time;
    }

    public function setUsCreaTime(\DateTimeInterface $us_crea_time): self
    {
        $this->us_crea_time = $us_crea_time;

        return $this;
    }

    public function getUsLastCnx(): ?\DateTimeInterface
    {
        return $this->us_last_cnx;
    }

    public function setUsLastCnx(\DateTimeInterface $us_last_cnx): self
    {
        $this->us_last_cnx = $us_last_cnx;

        return $this;
    }

    public function getUsActive(): ?bool
    {
        return $this->us_active;
    }

    public function setUsActive(bool $us_active): self
    {
        $this->us_active = $us_active;

        return $this;
    }
}
