<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'wallet';
    protected $fillable = [
        'direct',
        'customer_ref',
        'store_ref',
        'subwarehouse_ref',
        'warehouse_ref',
        'merchant_ref',
        'vendor_ref',
        'employee_ref',
        'bp_ref',
        'transporter_ref',
        'delivery_ref',
        'poola',
        'poolb',
        'poolc',
        'poold',
        'poole',
        'poolf',
        'poolg',
        'used',
        'user_id',
        'bill_id',
        'transfer_id',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function bill()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }
    public function transfer()
    {
        return $this->belongsTo(Transfer::class, 'transfer_id');
    }   
    
}
    