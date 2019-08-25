<?php
declare(strict_types=1);

namespace App;

class Item
{
    /** @var string|null */
    private $name;

    /** @var int|null */
    private $price;

    /** @var float|null */
    private $discount;

    public function __construct(array $data)
    {
        foreach ($this as $propName => $propValue) {
            if (isset($data[$propName])) {
                $this->{$propName} = $data[$propName];
            }
        }
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return Item
     */
    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param $discount
     * @return Item
     */
    public function setDiscount($discount): self
    {
        $this->discount = $discount;

        return $this;
    }
}
