<?php
declare(strict_types=1);

namespace App;

use App\Rules\CountRule;
use App\Rules\NameRule;
use App\Rules\RuleInterface;

class DiscountRuleProvider
{
    private $rulesData;

    public function __construct(array $rulesData)
    {
        $this->rulesData = $rulesData;
    }

    /**
     * @return RuleInterface[]|null
     */
    public function getRules(): array
    {
        return array_map(static function (array $ruleArr) {
            $rule = null;

            switch ($ruleArr['type']) {
                case NameRule::getType():
                    $rule = new NameRule($ruleArr['names'], $ruleArr['discount']);
                    break;
                case CountRule::getType():
                    $rule = new CountRule($ruleArr['count'], $ruleArr['discount'], $ruleArr['excludeNames']);
            }

            return $rule;
        }, $this->rulesData);
    }
}
