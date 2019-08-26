<?php
declare(strict_types=1);

namespace App\Defaults;


class RuleDefaults
{
    public static function getData(): array
    {
        return [
            [
                'type' => 'name',
                'names' => [ItemDefaults::A_NAME, ItemDefaults::B_NAME],
                'discount' => 0.9
            ],
            [
                'type' => 'name',
                'names' => [ItemDefaults::D_NAME, ItemDefaults::E_NAME],
                'discount' => 0.94
            ],
            [
                'type' => 'name',
                'names' => [ItemDefaults::E_NAME, ItemDefaults::F_NAME, ItemDefaults::G_NAME],
                'discount' => 0.97
            ],
            [
                'type' => 'multipleName',
                'names' => [ItemDefaults::A_NAME],
                'multipleNames' => [ItemDefaults::K_NAME, ItemDefaults::L_NAME, ItemDefaults::M_NAME],
                'discount' => 0.95
            ],
            [
                'type' => 'count',
                'count' => 3,
                'discount' => 0.95,
                'excludeNames' => [ItemDefaults::A_NAME, ItemDefaults::C_NAME],
            ],
            [
                'type' => 'count',
                'count' => 4,
                'discount' => 0.90,
                'excludeNames' => [ItemDefaults::A_NAME, ItemDefaults::C_NAME],
            ],
            [
                'type' => 'count',
                'count' => 5,
                'discount' => 0.80,
                'excludeNames' => [ItemDefaults::A_NAME, ItemDefaults::C_NAME],
            ],
        ];
    }
}