<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
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
 * @property Product $group_id
 * @property Category $category
 */
class ProductResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $products  = Product::where('group_id', $this->group_id)->get();

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
            'group_products' =>  ProductMinResource::collection($products),
        ];
    }
}
