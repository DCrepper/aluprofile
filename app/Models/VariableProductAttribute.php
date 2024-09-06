<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $product_variation_id
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|VariableProductAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariableProductAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariableProductAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|VariableProductAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableProductAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableProductAttribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableProductAttribute whereProductVariationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableProductAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariableProductAttribute whereValue($value)
 * @mixin \Eloquent
 */
class VariableProductAttribute extends Model
{
    protected $fillable = [
        'name',
        'value',
        'product_variation_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
