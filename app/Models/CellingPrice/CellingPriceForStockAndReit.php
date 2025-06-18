<?php

namespace App\Models\CellingPrice;

use App\Enums\CellingPrice\CellingPriceType;
use App\Models\Reit\RealStateFund;
use App\Models\Stock\Stock;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne};
use Illuminate\Notifications\Notifiable;

class CellingPriceForStockAndReit extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'type',
        'stock_id',
        'reit_id',
        'average_last_five_years_dividend',
        'target_yield',
        'desired_return',
        'price_ceiling',
    ];

    protected function casts()
    {
        return [
            'type' => CellingPriceType::class,
        ];
    }

    /**
     * @return HasOne<FiveYearsAverageFromStockOrReit, $this>
     */
    public function fiveYearsAverageFromStockOrReit(): HasOne
    {
        return $this->hasOne(FiveYearsAverageFromStockOrReit::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Stock, $this>
     */
    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }

    /**
     * @return BelongsTo<RealStateFund, $this>
     */
    public function reit(): BelongsTo
    {
        return $this->belongsTo(RealStateFund::class);
    }
}
