<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * @method static static POSTS()
 * @method static static MAEDIA()
 * @method static static PAGES()
 * @method static static CATEGORY()
 * @method static static PRODUCTS()
 * @method static static PRODUCTSCATEGORIES()
 * @method static static PRODUCTSTAGS()
 * @method static static PAYMENTGATEWAYS()
 * @method static static SHIPPINGMETHODS()
 * @method static static SHIPPINGZONES()
 * @method static static CATEGORIES()
 * @method static static COLLECTIONS()
 */
final class WordpressEndpoints
{
    public const POSTS = 'posts/';

    public const MAEDIA = 'media/';

    public const PAGES = 'pages/';

    public const CATEGORY = 'category/';

    public const PRODUCTS = 'products';

    public const PRODUCTSCATEGORIES = 'products/categories';

    public const PRODUCTSTAGS = 'products/tags';

    public const PAYMENTGATEWAYS = 'payment_gateways';

    public const SHIPPINGMETHODS = 'shipping_methods';

    public const SHIPPINGZONES = 'shipping/zones';
}
