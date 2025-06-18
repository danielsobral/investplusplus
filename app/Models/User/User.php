<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\CellingPrice\{CellingPriceForStockAndReit, FiveYearsAverageFromStockOrReit};
use App\Models\FinancialControl\{FinancialCategory, FinancialTransaction, TransactionType};
use App\Models\Goal\DreamAndGoal;
use App\Models\Reit\{RealStateFund, ReitReturn};
use App\Models\Stock\{Stock, StockFairPrice, StockReturn};
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, HasOne};
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use Notifiable;
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'password',
        'email',
        'email_verified_at',
        'avatar_path_url',
        'status',
        'birthday',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'birthday'          => 'datetime',
            'status'            => 'integer',
            'is_admin'          => 'integer',
        ];
    }

    /**
     * @return HasMany<Address, $this>
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * @return HasMany<DreamAndGoal, $this>
     */
    public function dreamsAndGoals(): HasMany
    {
        return $this->hasMany(DreamAndGoal::class);
    }

    /**
     * @return HasMany<Phone, $this>
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class);
    }

    /**
     * @return HasMany<TransactionType, $this>
     */
    public function transactionTypes(): HasMany
    {
        return $this->hasMany(TransactionType::class);
    }

    /**
     * @return HasMany<FinancialCategory, $this>
     */
    public function financialCategories(): HasMany
    {
        return $this->hasMany(FinancialCategory::class);
    }

    /**
     * @return HasMany<FinancialTransaction, $this>
     */
    public function financialTransactions(): HasMany
    {
        return $this->hasMany(FinancialTransaction::class);
    }

    /**
     * @return HasMany<RealStateFund, $this>
     */
    public function realStateFunds(): HasMany
    {
        return $this->hasMany(RealStateFund::class);
    }

    /**
     * @return hasOne<ReitReturn, $this>
     */
    public function reitReturn(): HasOne
    {
        return $this->hasOne(ReitReturn::class);
    }

    /**
     * @return HasMany<Stock, $this>
     */
    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    /**
     * @return HasMany<StockFairPrice, $this>
     */
    public function stockFairPrices(): HasMany
    {
        return $this->hasMany(StockFairPrice::class);
    }

    /**
     * @return HasOne<StockReturn, $this>
     */
    public function stockReturn(): HasOne
    {
        return $this->hasOne(StockReturn::class);
    }

    /**
     * @return HasMany<CellingPriceForStockAndReit, $this>
     */
    public function cellingPriceForStockAndReits(): HasMany
    {
        return $this->hasMany(CellingPriceForStockAndReit::class);
    }

    /**
     * @return HasMany<FiveYearsAverageFromStockOrReit, $this>
     */
    public function fiveYearsAverageFromStockOrReits(): HasMany
    {
        return $this->hasMany(FiveYearsAverageFromStockOrReit::class);
    }
}
