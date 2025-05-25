<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoffeeConsumption extends Model
{
    /** @use HasFactory<\Database\Factories\CoffeeConsumptionFactory> */
    use HasFactory;

    protected $table = 'coffee_consumptions';
    protected $fillable = ['user_id', 'consumed_at'];

    protected $dates = ['consumed_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
