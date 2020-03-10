<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuotationRepository")
 */
class Quotation
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
     * @ORM\Column(type="string", length=100)
     */
    private $num_tva;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ref;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $delivery_address;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $billing_address;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="quotations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ServiceQuotation", mappedBy="quotation")
     */
    private $service_quotations;

    public function __construct()
    {
        $this->service_quotations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNumTva()
    {
        return $this->num_tva;
    }

    /**
     * @param mixed $num_tva
     * @return Quotation
     */
    public function setNumTva($num_tva)
    {
        $this->num_tva = $num_tva;
        return $this;
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

    public function getCompany(): ?User
    {
        return $this->company;
    }

    public function setCompany(?User $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     * @return Quotation
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
        return $this;
    }


    /**
     * @return Collection|ServiceQuotation[]
     */
    public function getServiceQuotations(): Collection
    {
        return $this->service_quotations;
    }

    public function addServiceQuotation(ServiceQuotation $serviceQuotation): self
    {
        if (!$this->service_quotations->contains($serviceQuotation)) {
            $this->service_quotations[] = $serviceQuotation;
            $serviceQuotation->setQuotation($this);
        }

        return $this;
    }

    public function removeServiceQuotation(ServiceQuotation $serviceQuotation): self
    {
        if ($this->service_quotations->contains($serviceQuotation)) {
            $this->service_quotations->removeElement($serviceQuotation);
            // set the owning side to null (unless already changed)
            if ($serviceQuotation->getQuotation() === $this) {
                $serviceQuotation->setQuotation(null);
            }
        }

        return $this;
    }


    public function __toString()
    {
        return 'Devis #' . $this->ref . ' du ' . $this->request_date->format('d/m/Y');
    }
}
