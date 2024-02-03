<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Token extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'values_in',
        'discount',
        'retailer',
        'retailer_ref',
        'sub_warehouse',
        'sub_warehouse_ref',
        'merchant',
        'merchant_ref',
        'vendor',
        'vendor_ref',
        'customer',
        'referrer',
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
