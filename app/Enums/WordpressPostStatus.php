<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * @method static static PUBLISH()
 * @method static static FUTURE()
 * @method static static DRAFT()
 * @method static static PENDING()
 * @method static static PRIVATE()
 * @method static static TRASH()
 * @method static static AUTO_DRAFT()
 * @method static static INHERIT()
 */
final class WordpressPostStatus
{
    public const PUBLISH = 'publish';

    public const FUTURE = 'future';

    public const DRAFT = 'draft';

    public const PENDING = 'pending';

    public const PRIVATE = 'private';

    public const TRASH = 'trash';

    public const AUTO_DRAFT = 'auto-draft';

    public const INHERIT = 'inherit';

    /**
     * toArray
     *
     * @return array
     */
    public static function toArray(): array
    {
        return [
            self::PUBLISH,
            self::FUTURE,
            self::DRAFT,
            self::PENDING,
            self::PRIVATE,
            self::TRASH,
            self::AUTO_DRAFT,
            self::INHERIT,
        ];
    }
}
