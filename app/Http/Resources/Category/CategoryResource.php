<?php

namespace App\Http\Resources\Category;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Category $id
 * @property Category $title
 */
class CategoryResource extends JsonResource
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
            'title' => $this->title
        ];
    }
}
