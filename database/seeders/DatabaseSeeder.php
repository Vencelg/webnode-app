<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Order::factory()->count(10)->create()->each(function (Order $order) {
            OrderItem::factory()->count(rand(3,6))->create([
                'order_id' => $order->id,
            ]);
        });
    }
}
