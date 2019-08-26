<?php
declare(strict_types=1);

namespace App;

use App\Rules\RuleInterface;

class Item
{
    /** @var string|null */
    private $name;

    /** @var int|null */
    private $price;

    /** @var RuleInterface|null */
    private $rule;

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
     * @return RuleInterface|null
     */
    public function getRule(): ?RuleInterface
    {
        return $this->rule;
    }

    /**
     * @param RuleInterface $rule
     * @return Item
     */
    public function setRule(RuleInterface $rule): self
    {
        $this->rule = $rule;

        return $this;
    }
}
