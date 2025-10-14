<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'cost_per_unit',
        'quantity',
    ];

    protected $casts = [
        'cost_per_unit' => 'decimal:2',
        'quantity' => 'decimal:4',
    ];

    /**
     * Get the product that owns the raw material.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Calculate total cost for this raw material.
     */
    public function getTotalCost(): float
    {
        return $this->cost_per_unit * $this->quantity;
    }
}

