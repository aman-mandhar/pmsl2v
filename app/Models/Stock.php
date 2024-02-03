<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;
use App\Models\Merchant;
use App\Models\Vendor;

class Stock extends Model
{
    protected $fillable = [
        'item_id',
        'weight',
        'qty',
        'pur_value',
        'gst',
        'mrp',
        'expences',
        'sale_price',
        'discount',
        'subwarehouse_tokens',
        'subwarehouse_ref_tokens',
        'profit_before_discount_tokens',
        'profit_after_discount_tokens',
        'profit_after_tokens',    
        'pur_bill_pic',
        'pur_bill_no',
        'pur_date',
        'merchant_id',
        'vendor_id',
        'qrcode',
        'barcode',
        'batch_no',
        'mfg_date',
        'exp_date',
        'remarks',
        'user_id',
    ];
      
    
    // Relationships
    
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

}
