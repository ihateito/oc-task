<?php
declare(strict_types=1);

namespace App\Rules;

use App\Item;

class NameRule implements RuleInterface
{
    private $names;

    private $discount;

    public function __construct(array $names, float $discount)
    {
        $this->names = $names;
        $this->discount = $discount;
    }

    /**
     * @param Item[] $items
     */
    public function calc(array $items): void
    {
        $groupedItems = $this->groupByName($items);
        $countByNames = [];

        foreach ($this->names as $name) {
            if (isset($groupedItems[$name])) {
                $countByNames[] = count(
                    array_filter($groupedItems[$name],
                        static function (Item $item) {
                            return $item->getDiscount() === null;
                        }
                    )
                );
            } else {
                return;
            }
        }
        for ($i = 0, $iMax = min($countByNames); $i < $iMax; $i++) {
            foreach ($this->names as $name) {
                /** @var Item $item */
                $item = $groupedItems[$name][$i];
                $item->setDiscount($this->discount);
            }
        }
    }

    /**
     * @param Item[] $items
     * @return array
     */
    private function groupByName(array $items): array
    {
        $groupedItems = [];

        foreach ($items as $item) {
            $groupedItems[$item->getName()][] = $item;
        }

        return $groupedItems;
    }
}
