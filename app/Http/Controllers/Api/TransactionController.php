<?php

// namespace App\Http\Controllers\Api;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
// use App\Models\{Product, Transaction, AuditLog};
// use App\Http\Controllers\Controller;
// use Exception;

// class TransactionController extends Controller
// {
//     public function process(Request $request)
//     {
//         if ($request->has('items')) {
//             $request->validate([
//                 'items' => 'required|array|min:1',
//                 'items.*.product_id' => 'required|exists:products,id',
//                 'items.*.quantity' => 'required|integer|min:1'
//             ]);
//             $items = $request->items;
//         } else {
//             $request->validate([
//                 'product_id' => 'required|exists:products,id',
//                 'quantity' => 'required|integer|min:1'
//             ]);
//             $items = [[
//                 'product_id' => $request->product_id,
//                 'quantity' => $request->quantity
//             ]];
//         }

//         DB::beginTransaction();

//         try {
//             $totalPrice = 0;
//             $transactions = [];

//             foreach ($items as $item) {
//                 $product = Product::where('id', $item['product_id'])
//                     ->lockForUpdate()
//                     ->with('inventory')
//                     ->firstOrFail();

//                 if ($product->inventory->stock < $item['quantity']) {
//                     throw new Exception("Insufficient stock for product ID {$item['product_id']}");
//                 }

//                 $product->inventory->decrement('stock', $item['quantity']);

//                 $itemTotal = $product->inventory->cost * $item['quantity'];
//                 $totalPrice += $itemTotal;

//                 $transactions[] = [
//                     'product_id' => $product->id,
//                     'quantity' => $item['quantity'],
//                     'total_price' => $itemTotal,
//                     'type' => 'sale',
//                     'timestamp' => now()
//                 ];
//             }

//             foreach ($transactions as $txn) {
//                 $transaction = Transaction::create($txn);
//                 AuditLog::create([
//                     'transaction_id' => $transaction->id,
//                     'message' => 'Transaction recorded'
//                 ]);
//             }

//             DB::commit();

//             return response()->json([
//                 'message' => 'Transaction successful',
//                 'total_price' => $totalPrice
//             ]);

//         } catch (Exception $e) {
//             DB::rollBack();
//             return response()->json(['error' => $e->getMessage()], 400);
//         }
//     }
// }




namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Product, Transaction, AuditLog};
use App\Http\Controllers\Controller;
use Exception;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function process(Request $request)
    {
        if ($request->has('items')) {
            $request->validate([
                'items' => 'required|array|min:1',
                'items.*.product_id' => 'required|exists:products,id',
                'items.*.quantity' => 'required|integer|min:1'
            ]);
            $items = $request->items;
        } else {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1'
            ]);
            $items = [[
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]];
        }

        DB::beginTransaction();

        try {
            $totalPrice = 0;
            $transactions = [];
            $now = Carbon::now();

            foreach ($items as $item) {
                $product = Product::where('id', $item['product_id'])
                    ->lockForUpdate()
                    ->with('inventory')
                    ->firstOrFail();

                if ($product->inventory->stock < $item['quantity']) {
                    throw new Exception("Insufficient stock for product ID {$item['product_id']}");
                }

                $unitPrice = $product->inventory->cost;

                if ($item['quantity'] >= 10) {
                    $unitPrice *= 0.95; // 5% discount
                }

                if ($now->isWeekend()) {
                    $unitPrice *= 0.90; // 10% weekend discount
                }

                $itemTotal = $unitPrice * $item['quantity'];
                $totalPrice += $itemTotal;

                $product->inventory->decrement('stock', $item['quantity']);

                $transactions[] = [
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'total_price' => $itemTotal,
                    'type' => 'sale',
                    'timestamp' => $now
                ];
            }

            foreach ($transactions as $txn) {
                $transaction = Transaction::create($txn);

                AuditLog::create([
                    'transaction_id' => $transaction->id,
                    'message' => 'Transaction recorded'
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Transaction successful',
                'total_price' => round($totalPrice, 2)
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
