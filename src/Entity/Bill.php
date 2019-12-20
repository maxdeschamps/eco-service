<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Resume;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BillRepository")
 */
class Bill extends Resume
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductBill", mappedBy="bill")
     */
    private $product_bills;

    public function __construct()
    {
        $this->product_bills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?User
    {
        return $this->customer;
    }

    public function setCustomer(?User $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return Collection|ProductBill[]
     */
    public function getProductBills(): Collection
    {
        return $this->product_bills;
    }

    public function addProductBill(ProductBill $productBill): self
    {
        if (!$this->product_bills->contains($productBill)) {
            $this->product_bills[] = $productBill;
            $productBill->setBill($this);
        }

        return $this;
    }

    public function removeProductBill(ProductBill $productBill): self
    {
        if ($this->product_bills->contains($productBill)) {
            $this->product_bills->removeElement($productBill);
            // set the owning side to null (unless already changed)
            if ($productBill->getBill() === $this) {
                $productBill->setBill(null);
            }
        }

        return $this;
    }
}
