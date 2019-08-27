<?php
declare(strict_types=1);

namespace App;

use App\Rules\CountRule;

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
        $isCountRuleApplied = false;

        foreach ($this->discountRuleProvider->getRules() as $rule) {
            /**
             * 8. Описанные скидки 5,6,7 не суммируются, применяется только одна из них
             */
            if (!$isCountRuleApplied && $rule::getType() === CountRule::getType()) {
                $isCountRuleApplied = $rule->calc($this->items);
            } elseif ($rule::getType() !== CountRule::getType()) {
                $rule->calc($this->items);
            }
        }

        $itemsPrice = 0;

        foreach ($this->items as $item) {
            $itemsPrice += $item->getRule() === null
                ? $item->getPrice() : $item->getPrice() * $item->getRule()->getDiscount();
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
