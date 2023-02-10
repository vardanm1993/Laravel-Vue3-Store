<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke(Product $product): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $product->colors()->detach();

            $product->tags()->detach();

            $product->delete();

            DB::commit();

            return redirect()->route('product.index');

        } catch (Exception $e) {
            DB::rollback();

            return response()->json(['message' => 'Product deletion failed'], 500);
        }
    }
}
