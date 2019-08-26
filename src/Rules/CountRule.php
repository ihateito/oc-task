<?php
declare(strict_types=1);

namespace App\Rules;

use App\Item;

/**
 * Class CountRule
 * Набор правил для вычисления скидок 5-7
 *
 * @package App\Rules
 */
class CountRule implements RuleInterface
{
    private static $type = 'count';

    /** @var array $excludeNames */
    private $excludeNames;

    /** @var float $discount */
    private $discount;

    /** @var int $discount */
    private $count;

    public function __construct(int $count, float $discount,array $excludeNames)
    {
        $this->discount = $discount;
        $this->count = $count;
        $this->excludeNames = $excludeNames;
    }

    /**
     * Вычисление скидок 5-7
     * @param Item[] $items
     * @return bool
     */
    public function calc(array $items): bool
    {
        /** @var Item[] $itemsForDiscount */
        $itemsForDiscount = [];

        foreach ($items as $key => $item) {
            if ($item->getRule() === null && !in_array($item->getName(), $this->excludeNames, true)) {
                $itemsForDiscount[] = $item;
            }
        }

        if (count($itemsForDiscount) >= $this->count) {
            for ($i = 0; $i < $this->count; $i++) {
                $itemsForDiscount[$i]->setRule($this);
            }

            return true;
        }

        return false;
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
