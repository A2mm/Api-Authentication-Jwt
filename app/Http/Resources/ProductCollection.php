<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'price'         => $this->price,
            'discount'      => $this->discount. '%',
            'total price'   => $this->price - ($this->price * $this->discount/100),
            'product_link'  => [
                'view'  => route('product.show', $this->id),
            ]
        ];
    }
}
