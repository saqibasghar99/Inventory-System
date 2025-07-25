<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Inventory;
use App\Models\PricingRule;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use illuminate\Database\Console\Seeds\WithoutModelEvents; 
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // PRODUCT 1
        $p1 = Product::create([
            'sku' => 'PROD001',
            'name' => 'Wireless Mouse',
            'description' => 'Ergonomic wireless mouse',
        ]);
        $p1->inventory()->create([
            'stock' => 50,
            'location' => 'Warehouse A',
            'cost' => 300,
            'lot_number' => 'LOT001'
        ]);
        PricingRule::create([
            'product_id' => $p1->id,
            'type' => 'time_based',
            'condition' => 'weekend',
            'amount' => 10,
            'is_percentage' => true,
            'valid_from' => Carbon::now()->subDays(10),
            'valid_to' => Carbon::now()->addDays(30),
            'precedence' => 1
        ]);
        PricingRule::create([
            'product_id' => $p1->id,
            'type' => 'quantity_based',
            'condition' => 'quantity >= 10',
            'amount' => 5,
            'is_percentage' => true,
            'valid_from' => Carbon::now()->subDays(10),
            'valid_to' => Carbon::now()->addDays(30),
            'precedence' => 2
        ]);
        Transaction::create([
            'product_id' => $p1->id,
            'type' => 'sale',
            'quantity' => 12,
            'total_price' => 270,
            'timestamp' => now()
        ]);

        // PRODUCT 2
        $p2 = Product::create([
            'sku' => 'PROD002',
            'name' => 'USB Keyboard',
            'description' => 'Standard USB keyboard',
        ]);
        $p2->inventory()->create([
            'stock' => 100,
            'location' => 'Warehouse B',
            'cost' => 250,
            'lot_number' => 'LOT002'
        ]);
        PricingRule::create([
            'product_id' => $p2->id,
            'type' => 'time_based',
            'condition' => 'weekday_morning',
            'amount' => 15,
            'is_percentage' => false,
            'valid_from' => Carbon::now()->subDays(5),
            'valid_to' => Carbon::now()->addDays(20),
            'precedence' => 1
        ]);
        Transaction::create([
            'product_id' => $p2->id,
            'type' => 'sale',
            'quantity' => 5,
            'total_price' => 235,
            'timestamp' => now()
        ]);

        // PRODUCT 3
        $p3 = Product::create([
            'sku' => 'PROD003',
            'name' => 'HDMI Cable',
            'description' => '2m long HDMI cable',
        ]);
        $p3->inventory()->create([
            'stock' => 200,
            'location' => 'Warehouse C',
            'cost' => 150,
            'lot_number' => 'LOT003'
        ]);
        PricingRule::create([
            'product_id' => $p3->id,
            'type' => 'quantity_based',
            'condition' => 'quantity >= 20',
            'amount' => 10,
            'is_percentage' => true,
            'valid_from' => Carbon::now()->subDays(3),
            'valid_to' => Carbon::now()->addDays(15),
            'precedence' => 1
        ]);
        Transaction::create([
            'product_id' => $p3->id,
            'type' => 'sale',
            'quantity' => 25,
            'total_price' => 135,
            'timestamp' => now()
        ]);

        // PRODUCT 4
        $p4 = Product::create([
            'sku' => 'PROD004',
            'name' => 'Bluetooth Speaker',
            'description' => 'Portable Bluetooth speaker',
        ]);
        $p4->inventory()->create([
            'stock' => 75,
            'location' => 'Warehouse D',
            'cost' => 800,
            'lot_number' => 'LOT004'
        ]);
        Transaction::create([
            'product_id' => $p4->id,
            'type' => 'purchase',
            'quantity' => 75,
            'total_price' => 60000,
            'timestamp' => now()
        ]);

        // PRODUCT 5
        $p5 = Product::create([
            'sku' => 'PROD005',
            'name' => 'Laptop Stand',
            'description' => 'Adjustable aluminum laptop stand',
        ]);
        $p5->inventory()->create([
            'stock' => 30,
            'location' => 'Warehouse E',
            'cost' => 450,
            'lot_number' => 'LOT005'
        ]);
        PricingRule::create([
            'product_id' => $p5->id,
            'type' => 'time_based',
            'condition' => 'night_discount',
            'amount' => 20,
            'is_percentage' => false,
            'valid_from' => Carbon::now()->subDays(2),
            'valid_to' => Carbon::now()->addDays(10),
            'precedence' => 1
        ]);

        // PRODUCT 6
        $p6 = Product::create([
            'sku' => 'PROD006',
            'name' => 'USB-C Hub',
            'description' => '5-in-1 USB-C multiport adapter',
        ]);
        $p6->inventory()->create([
            'stock' => 90,
            'location' => 'Warehouse F',
            'cost' => 620,
            'lot_number' => 'LOT006'
        ]);
        PricingRule::create([
            'product_id' => $p6->id,
            'type' => 'quantity_based',
            'condition' => 'quantity >= 5',
            'amount' => 8,
            'is_percentage' => true,
            'valid_from' => Carbon::now()->subDays(1),
            'valid_to' => Carbon::now()->addDays(7),
            'precedence' => 1
        ]);
        Transaction::create([
            'product_id' => $p6->id,
            'type' => 'sale',
            'quantity' => 6,
            'total_price' => 3400,
            'timestamp' => now()
        ]);

        // PRODUCT 7
        $p7 = Product::create([
            'sku' => 'PROD007',
            'name' => 'External Hard Drive',
            'description' => '1TB USB 3.0 external hard disk',
        ]);
        $p7->inventory()->create([
            'stock' => 40,
            'location' => 'Warehouse G',
            'cost' => 1200,
            'lot_number' => 'LOT007'
        ]);
        Transaction::create([
            'product_id' => $p7->id,
            'type' => 'sale',
            'quantity' => 2,
            'total_price' => 2200,
            'timestamp' => now()
        ]);
    }
}
