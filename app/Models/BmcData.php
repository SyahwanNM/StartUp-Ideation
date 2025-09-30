<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BmcData extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'customer_segments',
        'value_propositions',
        'channels',
        'customer_relationships',
        'revenue_streams',
        'key_resources',
        'key_activities',
        'key_partnerships',
        'cost_structure',
    ];

    protected $casts = [
        'customer_segments' => 'array',
        'value_propositions' => 'array',
        'channels' => 'array',
        'customer_relationships' => 'array',
        'revenue_streams' => 'array',
        'key_resources' => 'array',
        'key_activities' => 'array',
        'key_partnerships' => 'array',
        'cost_structure' => 'array',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
