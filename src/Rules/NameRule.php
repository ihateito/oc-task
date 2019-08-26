<?php
declare(strict_types=1);

namespace App\Rules;

use App\Item;

/**
 * Class NameRule
 * Набор правил для вычисления скидок 1-3
 *
 * @package App\Rules
 */
class NameRule implements RuleInterface
{
    private static $type = 'name';

    /** @var array $names */
    protected $names;

    /** @var float $discount */
    protected $discount;

    public function __construct(array $names, float $discount)
    {
        $this->names = $names;
        $this->discount = $discount;
    }

    /**
     * Вычисление скидок 1-3
     * @param Item[] $items
     * @return bool
     */
    public function calc(array $items): bool
    {
        $itemsForDiscount = $this->getItemsForDiscount($items);

        if ($itemsForDiscount) {
            for ($i = 0, $iMax = count(min($itemsForDiscount)); $i < $iMax; $i++) {
                foreach ($this->names as $name) {
                    /** @var Item $item */
                    $item = $itemsForDiscount[$name][$i];
                    $item->setRule($this);
                }
            }

            return true;
        }

        return false;
    }

    /**
     * @param array $items
     * @return array
     */
    protected function getItemsForDiscount(array $items): array
    {
        $groupedItems = $this->groupByName($items);
        $itemsForDiscount = [];

        foreach ($this->names as $name) {
            if (isset($groupedItems[$name])) {
                $itemsForDiscount[$name] =
                    array_values(array_filter($groupedItems[$name],
                        static function (Item $item) {
                            return $item->getRule() === null;
                        }
                    ));
            } else {
                return [];
            }
        }

        return $itemsForDiscount;
    }


    /**
     * @param Item[] $items
     * @return array
     */
    protected function groupByName(array $items): array
    {
        $groupedItems = [];

        foreach ($items as $item) {
            $groupedItems[$item->getName()][] = $item;
        }

        return $groupedItems;
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return static::$type;
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }
}
