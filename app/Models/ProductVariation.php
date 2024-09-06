<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $name
 * @property string|null $status
 * @property string|null $description
 * @property string|null $sku
 * @property string|null $price
 * @property string|null $regular_price
 * @property string|null $sale_price
 * @property int|null $stock_quantity
 * @property string|null $stock_status
 * @property string|null $weight
 * @property string|null $length
 * @property string|null $width
 * @property string|null $height
 * @property string|null $shipping_class
 * @property string|null $image_src
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Product|null $product
 * @method static \Database\Factories\ProductVariationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereImageSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereRegularPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereShippingClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereStockQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereStockStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariation whereWidth($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\VariableProductAttribute> $variation_attributes
 * @property-read int|null $variation_attributes_count
 * @mixin \Eloquent
 */
class ProductVariation extends Model
{
    use HasFactory;
    /*
    id	integer	Unique identifier for the resource.read-only
date_created	date-time	The date the variation was created, in the site's timezone.read-only
date_created_gmt	date-time	The date the variation was created, as GMT.read-only
date_modified	date-time	The date the variation was last modified, in the site's timezone.read-only
date_modified_gmt	date-time	The date the variation was last modified, as GMT.read-only
description	string	Variation description.
permalink	string	Variation URL.read-only
sku	string	Unique identifier.
price	string	Current variation price.read-only
regular_price	string	Variation regular price.
sale_price	string	Variation sale price.
date_on_sale_from	date-time	Start date of sale price, in the site's timezone.
date_on_sale_from_gmt	date-time	Start date of sale price, as GMT.
date_on_sale_to	date-time	End date of sale price, in the site's timezone.
date_on_sale_to_gmt	date-time	End date of sale price, as GMT.
on_sale	boolean	Shows if the variation is on sale.read-only
status	string	Variation status. Options: draft, pending, private and publish. Default is publish.
purchasable	boolean	Shows if the variation can be bought.read-only
virtual	boolean	If the variation is virtual. Default is false.
downloadable	boolean	If the variation is downloadable. Default is false.
downloads	array	List of downloadable files. See Product variation - Downloads properties
download_limit	integer	Number of times downloadable files can be downloaded after purchase. Default is -1.
download_expiry	integer	Number of days until access to downloadable files expires. Default is -1.
tax_status	string	Tax status. Options: taxable, shipping and none. Default is taxable.
tax_class	string	Tax class.
manage_stock	boolean	Stock management at variation level. Default is false.
stock_quantity	integer	Stock quantity.
stock_status	string	Controls the stock status of the product. Options: instock, outofstock, onbackorder. Default is instock.
backorders	string	If managing stock, this controls if backorders are allowed. Options: no, notify and yes. Default is no.
backorders_allowed	boolean	Shows if backorders are allowed.read-only
backordered	boolean	Shows if the variation is on backordered.read-only
weight	string	Variation weight.
dimensions	object	Variation dimensions. See Product variation - Dimensions properties
shipping_class	string	Shipping class slug.
shipping_class_id	string	Shipping class ID.read-only
image	object	Variation image data. See Product variation - Image properties
attributes	array	List of attributes. See Product variation - Attributes properties
menu_order	integer	Menu order, used to custom sort products.
meta_data	array	Meta data. See Product variation - Meta data properties
    */

    protected $fillable = [
        'product_id',
        'name',
        'status',
        'description',
        'sku',
        'price',
        'regular_price',
        'sale_price',
        'stock_quantity',
        'stock_status',
        'weight',
        'length',
        'width',
        'height',
        'shipping_class',
        'image_src',
    ];

    protected $with = ['attributes'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function variation_attributes(): HasMany
    {
        return $this->hasMany(VariableProductAttribute::class);
    }

    protected $casts = [
        'product_id' => 'integer',
    ];
}
