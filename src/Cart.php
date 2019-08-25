<?php
declare(strict_types=1);

namespace App;

class Cart
{
    public $items = [];

    /**
     * @param Item $item
     * @return $this
     */
    public function addItem(Item $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    public function calcItemsPrice(): void
    {
        $itemDiscountRules = new DiscountRulesProvider();

        foreach ($itemDiscountRules->getRules() as $rule) {
            $rule->calc($this->items);
        }
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
