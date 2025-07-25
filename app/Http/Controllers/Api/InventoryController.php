<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('inventory');

        if ($request->has('sku')) {
            $query->where('sku', $request->sku);
        }

        return response()->json($query->paginate(5));
    }

    public function show($id)
    {
        return Product::with('inventory', 'pricingRules')->findOrFail($id);
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate(['stock' => 'required|integer']);
        $product = Product::findOrFail($id);
        $product->inventory->update(['stock' => $request->stock]);

        return response()->json(['message' => 'Stock updated']);
    }
}
