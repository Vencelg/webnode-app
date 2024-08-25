<?php

namespace Database\Factories;

use App\Enums\OrderStateEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'order'.$this->faker->randomNumber(4),
            'amount' => $this->faker->randomNumber(4),
            'currency_code' => $this->faker->currencyCode(),
            'state' => OrderStateEnum::cases()[$this->faker->numberBetween(0, 2)],
        ];
    }
}
