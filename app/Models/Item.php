<?php

// Item model
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Models\ProductVariation;
use App\Models\Token;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'prod_pic',
        'type',
        'gst', 
        'category_id',
        'subcategory_id',
        'variation_id',
        'token_id',
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function categories()
    {
        return $this->hasMany(ProductCategory::class);
    }

    

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(ProductSubcategory::class, 'subcategory_id');
    }

    public function variation()
    {
        return $this->belongsTo(ProductVariation::class, 'variation_id');
    }

    public function tokens()
    {
        return $this->belongsTo(Token::class, 'token_id');
    }

   

    

}
