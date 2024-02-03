<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailerStock extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'retailer_stocks';

    // Define the primary key associated with the table:
    protected $primaryKey = 'id';

    // Define the attributes that are mass assignable:

    protected $fillable = [
        'stock_id',
        'retailer_id',
        'qty',
        'weight',
        'subwarehouse_id',
    ];

    // Eloquent relationship: a retailer stock belongs to a stock
    
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }

    // Eloquent relationship: a retailer stock belongs to a retailer

    public function retailer()
    {
        return $this->belongsTo(Retail::class, 'retailer_id');
    }

    // Eloquent relationship: a retailer stock belongs to a subwarehouse

    public function subwarehouse()
    {
        return $this->belongsTo(Subwarehouse::class, 'subwarehouse_id');
    }

}
