<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResumeRepository")
 */
class Resume
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $request_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $acceptance_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $approved;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $delivery_address;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $billing_address;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequestDate(): ?\DateTimeInterface
    {
        return $this->request_date;
    }

    public function setRequestDate(\DateTimeInterface $request_date): self
    {
        $this->request_date = $request_date;

        return $this;
    }

    public function getAcceptanceDate(): ?\DateTimeInterface
    {
        return $this->acceptance_date;
    }

    public function setAcceptanceDate(?\DateTimeInterface $acceptance_date): self
    {
        $this->acceptance_date = $acceptance_date;

        return $this;
    }

    public function getApproved(): ?bool
    {
        return $this->approved;
    }

    public function setApproved(bool $approved): self
    {
        $this->approved = $approved;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDeliveryAddress(): ?Address
    {
        return $this->delivery_address;
    }

    public function setDeliveryAddress(Address $delivery_address): self
    {
        $this->delivery_address = $delivery_address;

        return $this;
    }

    public function getBillingAddress(): ?Address
    {
        return $this->billing_address;
    }

    public function setBillingAddress(Address $billing_address): self
    {
        $this->billing_address = $billing_address;

        return $this;
    }
}
