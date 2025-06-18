<?php

namespace App\Models\Reit;

use App\Enums\Reit\ReitType;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class ReitReturn extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'reit_id',
        'reit_type',
        'reit',
        'reit_price',
        'monthly_dividend_yield',
        'reit_quantity',
        'annual_income',
        'monthly_income',
        'invested_amount',
    ];

    protected function casts(): array
    {
        return [
            'analysis_date' => 'datetime',
            'reit_type'     => ReitType::class,
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
     * @return BelongsTo<RealStateFund, $this>
     */
    public function realStateFund(): BelongsTo
    {
        return $this->belongsTo(RealStateFund::class);
    }
}
