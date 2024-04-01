<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    use HasFactory;
    use HasRelationships;

    protected $fillable = [
        "label",
        "quantity"
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
