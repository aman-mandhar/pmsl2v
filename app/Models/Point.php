<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Point extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'values_in',
        'discount',
        'points_employee',
        'points_ref_employee',
        'points_retailer',
        'points_ref_retailer',
        'points_warehouse',
        'points_ref_warehouse',
        'points_sub_warehouse',
        'points_ref_sub_warehouse',
        'points_merchant',
        'points_ref_merchant',
        'points_vendor',
        'points_ref_vendor',
        'points_transporter',
        'points_ref_transporter',
        'points_delivery_partner',
        'points_ref_delivery_partner',
        'points_business_promoter',
        'points_ref_business_promoter',
        'points_customer',
        'points_referrer',
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }
    
}


