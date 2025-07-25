<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PricingController extends Controller
{
    public function calculatePrice(Request $request, $id)
    {
        $product = Product::with('pricingRules', 'inventory')->findOrFail($id);
        $quantity = $request->input('quantity', 1);
        $now = Carbon::now();
        $base = $product->inventory->cost;

        foreach ($product->pricingRules->sortByDesc('priority') as $rule) {
            if ($rule->type === 'time' && $now->between($rule->start_time, $rule->end_time)) {
                $base -= $base * ($rule->value / 100);
            }

            if ($rule->type === 'quantity' && $quantity >= $rule->min_quantity) {
                $base -= $base * ($rule->value / 100);
            }
        }

        return response()->json([
            'final_price' => round($base * $quantity, 2)
        ]);
    }
}
