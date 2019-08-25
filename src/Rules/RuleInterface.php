<?php
declare(strict_types=1);

namespace App\Rules;

use App\Item;

interface RuleInterface
{
    /**
     * @param Item[] $items
     */
    public function calc(array $items): void;
}
