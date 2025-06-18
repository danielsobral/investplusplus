<?php

namespace App\Models\FinancialControl;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Notifications\Notifiable;

class TransactionType extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'name',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return HasMany<FinancialCategory, $this>
     */
    public function financialCategories(): HasMany
    {
        return $this->hasMany(FinancialCategory::class, 'type_id');
    }
}
