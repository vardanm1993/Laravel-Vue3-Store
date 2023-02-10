<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product): JsonResponse|RedirectResponse
    {
        $data = $request->validated();

        if (isset($data['preview_image'])){
            Storage::disk('public')->delete('/images' . $product->preview_image);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $tags = $data['tags'];
        $colors = $data['colors'];
        unset($data['tags'], $data['colors']);


        DB::beginTransaction();
        try {

            $product->update($data);

            $product->tags()->sync($tags);
            $product->colors()->sync($colors);

            DB::commit();

            return redirect()->route('product.show', compact('product'));

        } catch (Exception $e) {
            DB::rollback();

            return response()->json(['message' => 'Product update failed'], 500);
        }
    }

}
