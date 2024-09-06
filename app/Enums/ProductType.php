<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * @method static static VARIABLE()
 * @method static static SIMPLE()
 * @method static static GROUPED()
 * @method static static EXTERNAL()
 * @method static static FRONTDOOR()
 */
final class ProductType
{
    public const VARIABLE = 'variable';

    public const SIMPLE = 'simple';

    public const GROUPED = 'grouped';

    public const EXTERNAL = 'external';

    public const FRONT_DOOR = 'frontdoor';

    /**
     * toArray
     *
     * @return array
     */
    public static function toArray(): array
    {
        return [
            self::VARIABLE,
            self::SIMPLE,
            self::GROUPED,
            self::EXTERNAL,
            self::FRONT_DOOR,
        ];
    }

}
