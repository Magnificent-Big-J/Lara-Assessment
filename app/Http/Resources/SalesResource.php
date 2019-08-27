<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalesResource extends JsonResource
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
            'name'=> $this->product->name,
            'price'=> $this->product->price,
            'discount'=> $this->product->discountPerc,
            'date'=> $this->purchase_date
        ];
    }
}
