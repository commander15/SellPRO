<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    use HasRelationships;

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
