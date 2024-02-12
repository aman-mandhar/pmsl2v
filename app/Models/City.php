<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class City extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function getCityNameAttribute()
    {
        return $this->name;
    }

    public function setCityNameAttribute($value)
    {
        $this->name = $value;
    }

    public function getCityName()
    {
        return $this->name;
    }

    public function setCityName($value)
    {
        $this->name = $value;
    }
}
