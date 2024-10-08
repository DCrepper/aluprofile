<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            //'product_id' => $this->product_id,
            'sku' => $this->sku,
            'attributes' => AttributeResource::collection($this->attributes),
        ];
    }
}
