<?php

namespace App\Models\CellingPrice;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class FiveYearsAverageFromStockOrReit extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'celling_price_id',
        'first_year',
        'second_year',
        'third_year',
        'fourth_year',
        'fifth_year',
        'average',
    ];

    /**
     * @return BelongsTo<CellingPriceForStockAndReit, $this>
     */
    public function cellingPriceForStockAndReit(): BelongsTo
    {
        return $this->belongsTo(CellingPriceForStockAndReit::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
