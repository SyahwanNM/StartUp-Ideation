<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'projection_id',
        'name',
        'selling_price',
        'packaging_cost',
        'direct_labor_cost',
        'sales_percentage',
    ];

    protected $casts = [
        'selling_price' => 'decimal:2',
        'packaging_cost' => 'decimal:2',
        'direct_labor_cost' => 'decimal:2',
        'sales_percentage' => 'decimal:2',
    ];

    /**
     * Get the projection that owns the product.
     */
    public function projection(): BelongsTo
    {
        return $this->belongsTo(Projection::class);
    }

    /**
     * Get the raw materials for the product.
     */
    public function rawMaterials(): HasMany
    {
        return $this->hasMany(RawMaterial::class);
    }

    /**
     * Calculate total HPP (Cost of Goods Sold) for this product.
     * Includes: Raw materials + Packaging + Direct labor
     */
    public function getTotalHPP(): float
    {
        $totalHPP = 0;
        
        // Raw materials cost
        foreach ($this->rawMaterials as $material) {
            $totalHPP += $material->cost_per_unit * $material->quantity;
        }
        
        // Packaging cost (if provided)
        if ($this->packaging_cost) {
            $totalHPP += $this->packaging_cost;
        }
        
        // Direct labor cost (if provided)
        if ($this->direct_labor_cost) {
            $totalHPP += $this->direct_labor_cost;
        }
        
        return $totalHPP;
    }

    /**
     * Calculate gross profit per unit.
     */
    public function getGrossProfitPerUnit(): float
    {
        return $this->selling_price - $this->getTotalHPP();
    }

    /**
     * Calculate gross profit margin percentage.
     */
    public function getGrossProfitMargin(): float
    {
        if ($this->selling_price == 0) {
            return 0;
        }
        return ($this->getGrossProfitPerUnit() / $this->selling_price) * 100;
    }

    /**
     * Calculate units sold for a specific month based on total units and percentage.
     */
    public function getUnitsSoldForMonth(int $totalUnitsSold): int
    {
        return (int) round($totalUnitsSold * ($this->sales_percentage / 100));
    }

    /**
     * Calculate revenue for a specific month.
     */
    public function getRevenueForMonth(int $totalUnitsSold): float
    {
        return $this->getUnitsSoldForMonth($totalUnitsSold) * $this->selling_price;
    }

    /**
     * Calculate HPP for a specific month.
     */
    public function getHPPForMonth(int $totalUnitsSold): float
    {
        return $this->getUnitsSoldForMonth($totalUnitsSold) * $this->getTotalHPP();
    }

    /**
     * Calculate gross profit for a specific month.
     */
    public function getGrossProfitForMonth(int $totalUnitsSold): float
    {
        return $this->getRevenueForMonth($totalUnitsSold) - $this->getHPPForMonth($totalUnitsSold);
    }
}
