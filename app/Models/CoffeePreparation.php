<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoffeePreparation extends Model
{
    /** @use HasFactory<\Database\Factories\CoffeePreparationFactory> */
    use HasFactory;

    protected $table = 'coffee_preparations';

    protected $fillable = ['user_id', 'prepared_at', 'cups_estimated'];

    protected $dates = ['prepared_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormatedPreparedAt()
    {
        return $this->prepared_at ? \Carbon\Carbon::parse($this->prepared_at)->format('d/m/Y') : null;
    }
}
