<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\IndexProductResource;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke()
    {
        return IndexProductResource::collection(Product::all());
    }
}
