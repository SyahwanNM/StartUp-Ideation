<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_name',
        'business_name',
        'business_description',
        'location',
        'phone_number',
    ];

    public function bmcData()
    {
        return $this->hasOne(BmcData::class);
    }
}
