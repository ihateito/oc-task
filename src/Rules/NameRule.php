<?php
declare(strict_types=1);

namespace App\Rules;

use App\Item;

class NameRule implements RuleInterface
{
    private static $type = 'name';

    /** @var array $names */
    private $names;

    /** @var float $discount */
    protected $discount;

    public function __construct(array $names, float $discount)
    {
        $this->names = $names;
        $this->discount = $discount;
    }

    /**
     * @param Item[] $items
     * @return bool
     */
    public function calc(array $items): bool
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
                return false;
            }
        }

        for ($i = 0, $iMax = min($countByNames); $i < $iMax; $i++) {
            foreach ($this->names as $name) {
                /** @var Item $item */
                $item = $groupedItems[$name][$i];
                $item->setDiscount($this->discount);
            }
        }

        return true;
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

    /**
     * @return string
     */
    public static function getType(): string
    {
        return static::$type;
    }
}
