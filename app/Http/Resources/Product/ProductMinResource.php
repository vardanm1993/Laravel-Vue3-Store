<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Group\GroupResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Product $id
 * @property Product $title
 * @property Product $description
 * @property Product $content
 * @property Product $imageUrl
 * @property Product $price
 * @property Product $count
 * @property Product $is_published
 * @property Category $category
 * @property Group $group
 * @property Color $colors
 */
class ProductMinResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'image_url' => $this->imageUrl,
            'price' => $this->price,
            'count' => $this->count,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category),
            'colors' => ColorResource::collection($this->colors)

        ];
    }
}
