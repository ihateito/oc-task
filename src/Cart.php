<?php
declare(strict_types=1);

namespace App;

class Cart
{
    private $discountRuleProvider;

    /** @var Item[] $items */
    private $items = [];

    public function __construct(DiscountRuleProvider $discountRuleProvider)
    {
        $this->discountRuleProvider = $discountRuleProvider;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    public function calcItemsPrice(): float
    {
        foreach ($this->discountRuleProvider->getRules() as $rule) {
            $rule->calc($this->items);
        }

        $itemsPrice = 0;

        foreach ($this->items as $item) {
            $itemsPrice += $item->getPrice() * $item->getDiscount();
        }

        return $itemsPrice;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
