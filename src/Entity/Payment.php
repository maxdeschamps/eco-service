<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaymentRepository")
 */
class Payment
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_bluecard;

    /**
     * @ORM\Column(type="integer")
     */
    private $crypto;

    /**
     * @ORM\Column(type="date")
     */
    private $expiration_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getNumBluecard(): ?int
    {
        return $this->num_bluecard;
    }

    public function setNumBluecard(int $num_bluecard): self
    {
        $this->num_bluecard = $num_bluecard;

        return $this;
    }

    public function getCrypto(): ?int
    {
        return $this->crypto;
    }

    public function setCrypto(int $crypto): self
    {
        $this->crypto = $crypto;

        return $this;
    }

    public function getExpirationDate(): ?\DateTimeInterface
    {
        return $this->expiration_date;
    }

    public function setExpirationDate(\DateTimeInterface $expiration_date): self
    {
        $this->expiration_date = $expiration_date;

        return $this;
    }
}
