<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoffeePurchase extends Model
{
    /** @use HasFactory<\Database\Factories\CoffeePurchaseFactory> */
    use HasFactory;

    protected $table = 'coffee_purchases';
    protected $fillable = ['user_id', 'quantity'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
