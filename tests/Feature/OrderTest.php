<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    protected Order $order;

    protected function setUp(): void
    {
        parent::setUp();
        $this->order = Order::factory()->create();
    }

    public function testOrderDetailRouteReturnsOrder()
    {
        $response = $this->getJson(route('orders.detail', $this->order->id));

        $response->assertStatus(200)
            ->assertJson([
                'order' => $this->order->toArray(),
            ]);
    }

    public function testOrderDetailRouteReturnsNullForNonExistentOrder()
    {
        $nonExistentOrderId = 999;

        $response = $this->getJson(route('orders.detail', $nonExistentOrderId));

        $response->assertStatus(404)
            ->assertJson([]);
    }
}
