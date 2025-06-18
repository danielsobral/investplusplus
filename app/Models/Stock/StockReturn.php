<?php

namespace App\Models\Stock;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class StockReturn extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'stock_id',
        'stock',
        'stock_price',
        'average_dividend_yield',
        'stock_quantity',
        'annual_income',
        'monthly_income',
        'invested_amount',
    ];

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
}
