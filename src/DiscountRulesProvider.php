<?php
declare(strict_types=1);

namespace App;

use App\Rules\NameRule;
use App\Rules\RuleInterface;

class DiscountRulesProvider
{
    private static $rules = [
        [
            'type' => 'name',
            'names' => ['A', 'B'],
            'discount' => 0.9
        ],
        [
            'type' => 'name',
            'names' => ['D', 'E'],
            'discount' => 0.94
        ],
        [
            'type' => 'name',
            'names' => ['E', 'F', 'G'],
            'discount' => 0.97
        ],
    ];

    /**
     * @return RuleInterface[]|null
     */
    public function getRules(): array
    {
        return array_map(static function (array $ruleArr) {
            $rule = null;

            switch ($ruleArr['type']) {
                case 'name':
                    $rule = new NameRule($ruleArr['names'], $ruleArr['discount']);
            }

            return $rule;
        }, static::$rules);
    }
}
