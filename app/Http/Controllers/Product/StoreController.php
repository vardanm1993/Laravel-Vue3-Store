<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): JsonResponse|RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $tags = $data['tags'];
            $colors = $data['colors'];
            unset($data['tags'],$data['colors']);

            $product = Product::firstOrCreate([
                'title' => $data['title']
            ],$data);

            $product->tags()->attach($tags);
            $product->colors()->attach($colors);

            DB::commit();

            return redirect()->route('product.index');

        } catch (Exception $e) {
            DB::rollback();

            return response()->json(['message' => 'Product create failed'], 500);
        }
    }
}
