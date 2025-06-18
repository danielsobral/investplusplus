<?php

namespace App\Models\Reit;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class RealStateFundLeverage extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'reit_id',
        'asset_value',
        'liabilities_for_property_acquisition',
        'advance_from_property_sale',
        'advance_rental_income',
        'liabilities_from_receivables_securitization',
        'derivative_financial_instruments',
        'provisions_for_contingencies',
        'other_payables',
        'leverage',
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
     * @return BelongsTo<RealStateFund, $this>
     */
    public function realStateFund(): BelongsTo
    {
        return $this->belongsTo(RealStateFund::class);
    }
}
