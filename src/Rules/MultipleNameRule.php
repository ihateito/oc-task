<?php
declare(strict_types=1);

namespace App\Rules;


use App\Item;

/**
 * Class MultipleNameRule
 * Набор правил для вычисления скидки 4
 *
 * @package App\Rules
 */
class MultipleNameRule extends NameRule
{
    private $multipleNames;

    public function __construct(array $names, array $multipleNames, float $discount)
    {
        $this->multipleNames = $multipleNames;

        parent::__construct($names, $discount);
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return 'multipleName';
    }


    /**
     * Вычисление скидки 4
     * @param Item[] $items
     * @return bool
     */
    public function calc(array $items): bool
    {
        $itemsForDiscount = $this->getItemsForDiscount($items);
        $groupedItems = $this->groupByName($items);
        $countByMultipleNames = 0;

        if ($itemsForDiscount) {
            foreach ($this->multipleNames as $name) {
                if (isset($groupedItems[$name])) {
                    $countByMultipleNames += count($groupedItems[$name]);
                } else {
                    return false;
                }
            }

            $iMax = min([count(min($itemsForDiscount), $countByMultipleNames)]);

            for ($i = 0; $i < $iMax; $i++) {
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
}