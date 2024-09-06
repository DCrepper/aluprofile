<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * @method static static PENDING()
 * @method static static PROCESSING()
 * @method static static ONHOLD()
 * @method static static COMPLETED()
 * @method static static CANCELLED()
 * @method static static REFUNDED()
 * @method static static FAILED()
 * @method static static TRASH()
 */

final class WoocomerceOrderStatus
{
    public const PENDING = 'pending';

    public const PROCESSING = 'processing';

    public const ONHOLD = 'on-hold';

    public const COMPLETED = 'completed';

    public const CANCELLED = 'cancelled';

    public const REFUNDED = 'refunded';

    public const FAILED = 'failed';

    public const TRASH = 'trash';
}
