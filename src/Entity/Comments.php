<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
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
    private $trick_id;

    /**
     * @ORM\Column(type="text")
     */
    private $co_text;

    /**
     * @ORM\Column(type="integer")
     */
    private $co_author_id;

    /**
     * @ORM\Column(type="date")
     */
    private $co_last_update;

    /**
     * @ORM\Column(type="time")
     */
    private $co_last_time;

    /**
     * @ORM\Column(type="boolean")
     */
    private $co_active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrickId(): ?int
    {
        return $this->trick_id;
    }

    public function setTrickId(int $trick_id): self
    {
        $this->trick_id = $trick_id;

        return $this;
    }

    public function getCoText(): ?string
    {
        return $this->co_text;
    }

    public function setCoText(string $co_text): self
    {
        $this->co_text = $co_text;

        return $this;
    }

    public function getCoAuthorId(): ?int
    {
        return $this->co_author_id;
    }

    public function setCoAuthorId(int $co_author_id): self
    {
        $this->co_author_id = $co_author_id;

        return $this;
    }

    public function getCoLastUpdate(): ?\DateTimeInterface
    {
        return $this->co_last_update;
    }

    public function setCoLastUpdate(\DateTimeInterface $co_last_update): self
    {
        $this->co_last_update = $co_last_update;

        return $this;
    }

    public function getCoLastTime(): ?\DateTimeInterface
    {
        return $this->co_last_time;
    }

    public function setCoLastTime(\DateTimeInterface $co_last_time): self
    {
        $this->co_last_time = $co_last_time;

        return $this;
    }

    public function getCoActive(): ?bool
    {
        return $this->co_active;
    }

    public function setCoActive(bool $co_active): self
    {
        $this->co_active = $co_active;

        return $this;
    }
}
