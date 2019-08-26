<?php
declare(strict_types=1);

namespace App\Defaults;

/**
 * Class ItemNames
 */
class ItemDefaults
{
    public const A_NAME = 'A';

    public const B_NAME = 'B';

    public const C_NAME = 'C';

    public const D_NAME = 'D';

    public const E_NAME = 'E';

    public const F_NAME = 'F';

    public const G_NAME = 'G';

    public const H_NAME = 'H';

    public const I_NAME = 'I';

    public const J_NAME = 'J';

    public const K_NAME = 'K';

    public const L_NAME = 'L';

    public const M_NAME = 'M';

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
            static::C_NAME => [
                'name' => static::C_NAME,
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
            static::H_NAME => [
                'name' => static::H_NAME,
                'price' => 8,
            ],
            static::I_NAME => [
                'name' => static::I_NAME,
                'price' => 9,
            ],
            static::J_NAME => [
                'name' => static::J_NAME,
                'price' => 12,
            ],
            static::K_NAME => [
                'name' => static::K_NAME,
                'price' => 11,
            ],
            static::L_NAME => [
                'name' => static::L_NAME,
                'price' => 32,
            ],
            static::M_NAME => [
                'name' => static::M_NAME,
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
