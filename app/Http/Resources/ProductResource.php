<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product_id'      => $this->id, 
            'name'            => $this->name,
            'details'         => $this->details,
            'price'           => $this->price,
            'discount'        => $this->discount. '%',
            'total price'     => $this->price - ($this->price * $this->discount/100),
            'stock'           => $this->stock > 0 ? 'In stock' : 'Not available',
        ];
    }
}
