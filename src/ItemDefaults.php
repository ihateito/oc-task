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
            'D' => [
                'name' => 'D',
                'price' => 4,
            ],
            'E' => [
                'name' => 'E',
                'price' => 5,
            ],
            'F' => [
                'name' => 'F',
                'price' => 6,
            ],
            'G' => [
                'name' => 'G',
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
