<?php

namespace App\Models\Goal;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class DreamAndGoal extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'dream_name',
        'dream_avatar_path_url',
        'accumulated_wealth',
        'monthly_investment',
        'average_annual_return',
        'time_period',
        'annual_contribution',
        'return',
        'total_value',
        'income_per_year',
        'income_per_month',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
