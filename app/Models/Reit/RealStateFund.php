<?php

namespace App\Models\Reit;

use App\Enums\Reit\ReitType;
use App\Models\CellingPrice\CellingPriceForStockAndReit;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne};
use Illuminate\Notifications\Notifiable;

class RealStateFund extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'type',
        'twelve_month_dividend_yield',
        'price_to_book_ratio',
        'liquidity',
        'reits_vs_inflation',
        'management_fee',
        'vacancy_rate',
        'book_value',
        'reit_age',
        'leverage',
        'analysis_date',
    ];

    protected function casts(): array
    {
        return [
            'analysis_date' => 'datetime',
            'type'          => ReitType::class,
        ];
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasOne<ReitReturn, $this>
     */
    public function reitReturn(): HasOne
    {
        return $this->hasOne(ReitReturn::class);
    }

    /**
     * @return HasOne<RealStateFundLeverage, $this>
     */
    public function realStateFundLeverage(): HasOne
    {
        return $this->hasOne(RealStateFundLeverage::class);
    }

    /**
     * @return HasOne<CellingPriceForStockAndReit, $this>
     */
    public function cellingPriceForStockAndReit(): HasOne
    {
        return $this->hasOne(CellingPriceForStockAndReit::class);
    }
}
