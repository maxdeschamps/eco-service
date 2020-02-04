<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductSearchRepository")
 */
class ProductSearch
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
    private $min_priceTtc;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_priceTtc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinPriceTtc(): ?int
    {
        return $this->min_priceTtc;
    }

    public function setMinPriceTtc(?int $min_priceTtc): self
    {
        $this->min_priceTtc = $min_priceTtc;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxPriceTtc(): ?int
    {
        return $this->max_priceTtc;
    }

    /**
     * @param mixed $max_priceTtc
     * @return ProductSearch
     */
    public function setMaxPriceTtc(?int $max_priceTtc): self
    {
        $this->max_priceTtc = $max_priceTtc;

        return $this;
    }
}
