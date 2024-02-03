<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubwarehouseStock extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'subwarehouse_stocks';

    // Define the primary key associated with the table:
    protected $primaryKey = 'id';

    // Define the attributes that are mass assignable:
    protected $fillable = [
        'stock_id',
        'subwarehouse_id',
        'qty',
        'weight',
        'warehouse_id',
    ];

    // Eloquent relationship: a subwarehouse stock belongs to a stock
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }

    // Eloquent relationship: a subwarehouse stock belongs to a subwarehouse

    public function subwarehouse()
    {
        return $this->belongsTo(Subwarehouse::class, 'subwarehouse_id');
    }

    // Eloquent relationship: a subwarehouse stock belongs to a warehouse

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
    
}
