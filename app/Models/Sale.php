<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        "ref",
        "date",
        "time"
    ];

    public function seller(): HasOne {
        return $this->hasOne(User::class);
    }

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class);
    }

    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(Product::class, SaleProduct::class);
    }
}
