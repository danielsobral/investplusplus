<?php

namespace App\Models\Stock;

use App\Models\CellingPrice\CellingPriceForStockAndReit;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne};
use Illuminate\Notifications\Notifiable;

class Stock extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'average_dividend_yield',
        'profit_growth',
        'price_to_earnings_ratio',
        'pbv_times_pe_ratio',
        'net_margin',
        'return_on_equity',
        'net_debt',
        'stock_vs_inflation_last_10_years',
        'analysis_date',
    ];

    protected function casts(): array
    {
        return [
            'analysis_date' => 'datetime',
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
     * @return HasOne<StockFairPrice, $this>
     */
    public function stockFairPrice(): HasOne
    {
        return $this->hasOne(StockFairPrice::class);
    }

    /**
     * @return HasOne<CellingPriceForStockAndReit, $this>
     */
    public function cellingPriceForStockAndReit(): HasOne
    {
        return $this->hasOne(CellingPriceForStockAndReit::class);
    }

    /**
     * @return HasOne<StockReturn, $this>
     */
    public function stockReturn(): HasOne
    {
        return $this->hasOne(StockReturn::class);
    }
}
