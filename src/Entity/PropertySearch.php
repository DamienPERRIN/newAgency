<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch
{
    /**
     * @var int|null
     * @Assert\Range(
     *     min=100000,
     *     max=1000000,
     *     minMessage = "Le prix doit être supérieur à {{ limit }}",
     *     maxMessage = "Le prix doit être inférieur à {{ limit }}"
     *     )
     */
    private $maxPrice;

    /**
     * @var int|null
     * @Assert\Range(
     *     min=10,
     *     max=400,
     *     minMessage = "La surface doit être supérieur à {{ limit }}",
     *     maxMessage = "La surface doit être inférieur à {{ limit }}"
     *     )
     */
    private $minSurface;

    /**
     * @var ArrayCollection
     */
    private $option;

    public function __construct()
    {
        $this->option = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice(int $maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * @param int|null $minSurface
     * @return PropertySearch
     */
    public function setMinSurface(int $minSurface): PropertySearch
    {
        $this->minSurface = $minSurface;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getOption(): ArrayCollection
    {
        return $this->option;
    }

    /**
     * @param ArrayCollection $option
     * @return PropertySearch
     */
    public function setOption(ArrayCollection $option): PropertySearch
    {
        $this->option = $option;
        return $this;
    }


}