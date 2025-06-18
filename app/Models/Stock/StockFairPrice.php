<?php

namespace App\Models\Stock;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class StockFairPrice extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'stock_id',
        'graham',
        'earnings_per_share',
        'book_value_per_share',
        'risk_premium',
        'fair_price',
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
