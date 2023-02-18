<?php

namespace App\Http\Resources\Image;

use App\Models\Image;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Image $id
 * @property Image $product_id
 * @property Image $imageUrl
 */
class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'url' => $this->imageUrl,
        ];
    }
}
