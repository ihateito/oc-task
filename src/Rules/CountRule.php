<?php
declare(strict_types=1);

namespace App\Rules;

use App\Item;

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
     *
     *
     * @param Item[] $items
     * @return bool
     */
    public function calc(array $items): bool
    {
        $discountItems = [];

        foreach ($items as $key => $item) {
            if ($item->getDiscount() === null && !in_array($item->getName(), $this->excludeNames, true)) {
                $discountItems[] = $item;
            }
        }

        if (count($items) === $this->count && count($discountItems) === $this->count) {
            foreach ($discountItems as $item) {
                $item->setDiscount($this->discount);
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
}
