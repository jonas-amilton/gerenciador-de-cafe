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
    protected $fillable = ['user_id', 'quantity', 'purchased_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormatedPurchasedAt()
    {
        return $this->purchased_at ? \Carbon\Carbon::parse($this->purchased_at)->format('d/m/Y') : null;
    }
}
