<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FileRepository")
 */
class File
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uri;

    /**
     * @ORM\Column(type="integer", length=11)
     */
    private $orderFile;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $altFile;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function getOrderFile(): ?int
    {
        return $this->orderFile;
    }

    public function setOrderFile(int $orderFile): self
    {
        $this->orderFile = $orderFile;

        return $this;
    }

    public function getAltFile(): ?string
    {
        return $this->altFile;
    }

    public function setAltFile(?string $altFile): self
    {
        $this->altFile = $altFile;

        return $this;
    }
}
