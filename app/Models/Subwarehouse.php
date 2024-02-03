<?php

namespace App\Models;

use App\Models\User; // Import the User model
use Illuminate\Database\Eloquent\Model;

class Subwarehouse extends Model
{
    // Define the table associated with the model
    protected $table = 'subwarehouses';

    // Specify the fillable columns
    
    protected $fillable = [
        'user_id',
        'ref_id',
        'warehouse_id',
        'subwarehouse_add',
        'city',
        'subwarehouse_name',
        'mobile_no',
        'manager',
        'email',
        
    ];

    // Eloquent relationship: a store belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ref()
    {
        return $this->belongsTo(User::class, 'ref_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
}
