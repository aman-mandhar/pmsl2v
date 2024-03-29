<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bp extends Model
{
    protected $fillable = [
        'user_id',
        'ref_id',
        'add',
        'city',
        'promoter_name',
        'mobile_no',
        'email',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ref()
    {
        return $this->belongsTo(User::class, 'ref_id');
    }
}