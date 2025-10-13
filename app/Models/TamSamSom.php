<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TamSamSom extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'owner_name',
        'industry',
        'location',
        'tam_description',
        'tam_market_size',
        'tam_unit_value',
        'tam_value',
        'sam_description',
        'sam_percentage',
        'sam_market_size',
        'sam_value',
        'som_description',
        'som_percentage',
        'som_market_size',
        'som_value',
        'market_assumptions',
        'growth_projections',
    ];

    protected $casts = [
        'tam_market_size' => 'integer',
        'tam_unit_value' => 'decimal:2',
        'tam_value' => 'decimal:2',
        'sam_percentage' => 'decimal:2',
        'sam_market_size' => 'integer',
        'sam_value' => 'decimal:2',
        'som_percentage' => 'decimal:2',
        'som_market_size' => 'integer',
        'som_value' => 'decimal:2',
        'market_assumptions' => 'array',
        'growth_projections' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Accessor untuk format currency
    public function getFormattedTamValueAttribute()
    {
        return 'Rp ' . number_format($this->tam_value, 0, ',', '.');
    }

    public function getFormattedSamValueAttribute()
    {
        return 'Rp ' . number_format($this->sam_value, 0, ',', '.');
    }

    public function getFormattedSomValueAttribute()
    {
        return 'Rp ' . number_format($this->som_value, 0, ',', '.');
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('business_name', 'like', "%{$search}%")
              ->orWhere('owner_name', 'like', "%{$search}%")
              ->orWhere('industry', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%");
        });
    }

    // Scope untuk filter berdasarkan tanggal
    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}
