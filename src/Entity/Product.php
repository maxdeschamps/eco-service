<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
    private $price_ht;

    /**
     * @ORM\Column(type="integer")
     */
    private $price_ttc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="products")
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPriceHt(): ?int
    {
        return $this->price_ht;
    }

    public function setPriceHt(int $price_ht): self
    {
        $this->price_ht = $price_ht;

        return $this;
    }

    public function getPriceTtc(): ?int
    {
        return $this->price_ttc;
    }

    public function setPriceTtc(int $price_ttc): self
    {
        $this->price_ttc = $price_ttc;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
