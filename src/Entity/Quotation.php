<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Resume;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuotationRepository")
 */
class Quotation extends Resume
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="quotations")
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

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

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
}
