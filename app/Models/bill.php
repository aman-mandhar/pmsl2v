<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
        'cart_id',
        'total',
        'discount',
        'special_discount',
        'grand_total',
        'gst',
        'net_total',
        'paid',
        'points_customer',
        'points_ref',
        'points_store',
        'points_store_ref',
        'points_subwarehouse',
        'points_subwarehouse_ref',
        'points_warehouse',
        'points_warehouse_ref',
        'points_merchant',
        'points_merchant_ref',
        'points_vendor',
        'points_vendor_ref',
        'points_employee',
        'points_employee_ref',
        'points_bp',
        'points_bp_ref',
        'points_transporter',
        'points_transporter_ref',
        'points_delivery',
        'points_delivery_ref',
        'points_admin',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

