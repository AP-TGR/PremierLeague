<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\League", inversedBy="teams")
     */
    private $league;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Notblank
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Notblank
     */
    private $strip;

    /**
     * @ORM\Column(type="boolean", options={"default" : 1})
     */
    private $is_enabled;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\Notblank
     */
    private $created_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modified_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $deleted_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLeague(): ?League
    {
        return $this->league;
    }

    public function setLeague(?League $league): self
    {
        $this->league = $league;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStrip(): ?string
    {
        return $this->strip;
    }

    public function setStrip(string $strip): self
    {
        $this->strip = $strip;

        return $this;
    }

    public function getIsEnabled(): ?bool
    {
        return $this->is_enabled;
    }

    public function setIsEnabled(bool $is_enabled): self
    {
        $this->is_enabled = $is_enabled;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->created_date;
    }

    public function setCreatedDate(\DateTimeInterface $created_date): self
    {
        $this->created_date = $created_date;

        return $this;
    }

    public function getModifiedDate(): ?string
    {
        return $this->modified_date;
    }

    public function setModifiedDate(?string $modified_date): self
    {
        $this->modified_date = $modified_date;

        return $this;
    }

    public function getDeletedDate(): ?\DateTimeInterface
    {
        return $this->deleted_date;
    }

    public function setDeletedDate(?\DateTimeInterface $deleted_date): self
    {
        $this->deleted_date = $deleted_date;

        return $this;
    }
}
