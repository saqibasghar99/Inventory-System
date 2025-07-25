<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingRule extends Model
{
    protected $fillable = [
        'product_id',
        'type',
        'condition',
        'amount',
        'is_percentage',
        'valid_from',
        'valid_to',
        'precedence',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
