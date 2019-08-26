<?php
declare(strict_types=1);

namespace App\Rules;

use App\Item;

interface RuleInterface
{
    /**
     * @return string
     */
    public static function getType(): string;

    /**
     * @param Item[] $items
     * @return bool
     */
    public function calc(array $items): bool;

    /**
     * @return float
     */
    public function getDiscount(): float;
}
