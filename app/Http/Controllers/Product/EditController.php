<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Group;
use App\Models\Product;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $categories = Category::all();
        $groups = Group::all();
        $tags = Tag::all();
        $colors = Color::all();
        return view('product.edit', [
            'product' => $product,
            'categories' => $categories,
            'groups' => $groups,
            'tags' => $tags,
            'colors' => $colors
        ]);
    }
}
