<?php

namespace Tests\Unit;

use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    protected int $orderId;

    protected function setUp(): void
    {
        parent::setUp();
        $this->orderId = Order::factory()->create()->id;
    }

    public function testDetailReturnsOrderWhenFound()
    {
        $controller = new OrderController();
        $order = Order::find($this->orderId);
        $response = $controller->detail($this->orderId);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(['order' => $order->toArray()], $response->getData(true));
    }

    public function testDetailReturnsNullWhenOrderNotFound()
    {
        $controller = new OrderController();
        $response = $controller->detail(999);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals([], $response->getData());
    }
}
