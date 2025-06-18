<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Address extends Model
{
    use Notifiable;
    use HasUuids;

    protected $fillable = [
        'street',
        'number',
        'neighborhood',
        'city',
        'uf',
        'zip_code',
        'timezone',
    ];

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
