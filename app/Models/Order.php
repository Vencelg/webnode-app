<?php

namespace App\Models;

use App\Enums\OrderStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'amount',
        'currency_code',
        'state',
    ];

    /**
     * @var Array<string, OrderStateEnum>
     */
    protected $casts = [
        'state' => OrderStateEnum::class
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'orderItems'
    ];

    /**
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
