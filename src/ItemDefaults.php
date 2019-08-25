<?php
declare(strict_types=1);

namespace App;

/**
 * Class ItemNames
 */
class ItemDefaults
{
    public const A_NAME = 'A';

    public const B_NAME = 'B';

    public const D_NAME = 'D';

    public const E_NAME = 'E';

    public const F_NAME = 'F';

    public const G_NAME = 'G';

    /**
     * @return array
     */
    public static function getData(): array
    {
        return [
            static::A_NAME => [
                'name' => static::A_NAME,
                'price' => 1,
            ],
            static::B_NAME => [
                'name' => static::B_NAME,
                'price' => 2,
            ],
            'C' => [
                'name' => 'C',
                'price' => 3,
            ],
            static::D_NAME => [
                'name' => static::D_NAME,
                'price' => 4,
            ],
            static::E_NAME => [
                'name' => static::E_NAME,
                'price' => 5,
            ],
            static::F_NAME => [
                'name' => static::F_NAME,
                'price' => 6,
            ],
            static::G_NAME => [
                'name' => static::G_NAME,
                'price' => 7,
            ],
            'H' => [
                'name' => 'H',
                'price' => 8,
            ],
            'I' => [
                'name' => 'I',
                'price' => 9,
            ],
            'J' => [
                'name' => 'J',
                'price' => 12,
            ],
            'K' => [
                'name' => 'K',
                'price' => 11,
            ],
            'L' => [
                'name' => 'L',
                'price' => 32,
            ],
            'M' => [
                'name' => 'M',
                'price' => 13,
            ]
        ];
    }

    /**
     * @param string $name
     * @return array
     */
    public static function getItemData(string $name): array
    {
        return static::getData()[$name] ?? null;
    }
}
